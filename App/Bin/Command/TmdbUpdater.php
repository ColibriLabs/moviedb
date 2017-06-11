<?php

namespace ColibriLabs\Bin\Command;

use Colibri\ColibriORM;
use Colibri\Connection\ConnectionInterface;
use Colibri\Exception\BadCallMethodException;
use Colibri\Parameters\ParametersCollection;

use Colibri\Query\Statement\OrderBy;
use Colibri\ServiceContainer\ServiceLocator;
use ColibriLabs\Bin\Lib\TmdbDataNormalizer;
use ColibriLabs\Database\Om\Backdrop;
use ColibriLabs\Database\Om\BackdropRepository;
use ColibriLabs\Database\Om\Character;
use ColibriLabs\Database\Om\CharacterRepository;
use ColibriLabs\Database\Om\Collection;
use ColibriLabs\Database\Om\CollectionBackdrop;
use ColibriLabs\Database\Om\CollectionBackdropRepository;
use ColibriLabs\Database\Om\CollectionPoster;
use ColibriLabs\Database\Om\CollectionPosterRepository;
use ColibriLabs\Database\Om\CollectionRepository;
use ColibriLabs\Database\Om\Company;
use ColibriLabs\Database\Om\CompanyRepository;
use ColibriLabs\Database\Om\Country;
use ColibriLabs\Database\Om\CountryRepository;
use ColibriLabs\Database\Om\Crew;
use ColibriLabs\Database\Om\CrewRepository;
use ColibriLabs\Database\Om\Genre;
use ColibriLabs\Database\Om\GenreRepository;
use ColibriLabs\Database\Om\Language;
use ColibriLabs\Database\Om\LanguageRepository;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieCompany;
use ColibriLabs\Database\Om\MovieCompanyRepository;
use ColibriLabs\Database\Om\MovieCountry;
use ColibriLabs\Database\Om\MovieCountryRepository;
use ColibriLabs\Database\Om\MovieGenre;
use ColibriLabs\Database\Om\MovieGenreRepository;
use ColibriLabs\Database\Om\MovieLanguage;
use ColibriLabs\Database\Om\MovieLanguageRepository;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Database\Om\PhotoRepository;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\PictureRepository;
use ColibriLabs\Database\Om\Poster;
use ColibriLabs\Database\Om\PosterRepository;
use ColibriLabs\Database\Om\Profile;
use ColibriLabs\Database\Om\ProfileRepository;
use ColibriLabs\Lib\Util\Profiler;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Tmdb\Api\Collections;
use Tmdb\Api\Movies;
use Tmdb\Api\People;
use Tmdb\ApiToken;
use Tmdb\Client;

/**
 * Class TmdbUpdater
 *
 * @package ColibriLabs\Bin\Command
 */
class TmdbUpdater extends Command
{

  /**
   * @var ParametersCollection
   */
  protected $config;

  /**
   * @var ServiceLocator
   */
  protected $colibri;

  /**
   * @var Movies
   */
  protected $moviesApi;

  /**
   * @var People
   */
  protected $peopleApi;

  /**
   * @var Collections
   */
  protected $collectionApi;

  /**
   * @var TmdbDataNormalizer
   */
  protected $normalizer;

  /**
   * @var ConnectionInterface
   */
  protected $connection;

  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    Profiler::timerStart();

    $repository = new MovieRepository();
    $repository->orderByTmdbId(OrderBy::DESC);

    $lastMovie = $repository->findOne(null);
    $lastMovieId = $lastMovie instanceof Movie ? $lastMovie->getTmdbId() : 1;

    $until = 500000;

    for ($i = $lastMovieId; $i < $until; $i++) {
      try {
        $response = $this->moviesApi->getMovie($i);

        $this->connection->start();
        $movie = $this->processMovie($response);
        $this->connection->commit();

        $output->writeln(sprintf('Movie %d/%d (Memory: %s, Time spend: %s)', $movie->getId(), $i, Profiler::memoryUsage(), Profiler::timeSpendHumanize()));
      } catch (\Exception $exception) {
        $this->connection->rollback();
        $output->writeln(sprintf('RQ: %s, Error: [%s] %s', $i, get_class($exception), $exception->getMessage()));
      }
    }

    $output->writeln(sprintf('Finished! Time spend: %s', Profiler::timeSpendHumanize()));
  }

  /**
   * @param array $response
   * @return Movie
   */
  protected function processMovie(array $response)
  {
    $repository = new MovieRepository();

    if (!($movie = $repository->findOneByTmdbId($response['id']))) {
      $data = $this->normalizer->normalizeMovie($response);

      $movie = new Movie();
      $repository->hydrate($movie, $data);
      $repository->persist($movie);

      $this->processMovieImages($movie);

      if (isset($response['belongs_to_collection']) && count($response['belongs_to_collection']) > 0) {
        $this->processCollection($response['belongs_to_collection'], $movie);
      }

      if (isset($response['spoken_languages']) && count($response['spoken_languages']) > 0) {
        $this->processSpokenLang($response['spoken_languages'], $movie);
      }

      if (isset($response['production_countries']) && count($response['production_countries']) > 0) {
        $this->processCountries($response['production_countries'], $movie);
      }

      if (isset($response['production_companies']) && count($response['production_companies']) > 0) {
        $this->processCompanies($response['production_companies'], $movie);
      }

      if (isset($response['genres']) && count($response['genres']) > 0) {
        $this->processGenres($response['genres'], $movie);
      }

      $this->processCharacters($movie);
      $this->processCrews($movie);
    }

    return $movie;
  }

  /**
   * @param Movie $movie
   */
  protected function processMovieImages(Movie $movie)
  {
    $response = $this->moviesApi->getImages($movie->getTmdbId());

    $posters = new PosterRepository();
    $backdrops = new BackdropRepository();
    $pictures = new PictureRepository();

    if (isset($response['posters']) && count($response['posters'])) {
      foreach ($response['posters'] as $posterData) {
        $picture = $this->processPicture($posterData, $pictures);

        $postersPersister = $posters->createInsertQuery();
        $postersPersister->ignore();
        $postersPersister->setDataBatch([
          'movie_id' => $movie->getId(),
          'picture_id' => $picture->getId()
        ]);

        $this->connection->execute($postersPersister);
      }
    }

    if (isset($response['backdrops']) && count($response['backdrops'])) {
      foreach ($response['backdrops'] as $backdropData) {
        $picture = $this->processPicture($backdropData, $pictures);

        $backdropsPersister = $backdrops->createInsertQuery();
        $backdropsPersister->ignore();
        $backdropsPersister->setDataBatch([
          'movie_id' => $movie->getId(),
          'picture_id' => $picture->getId()
        ]);

        $this->connection->execute($backdropsPersister);
      }
    }
  }

  protected function processCountries(array $response, Movie $movie)
  {
    $repository = new CountryRepository();

    foreach ($response as $countryData) {
      if (!($country = $repository->findOneBy([Country::ISO_3166_1, $countryData['iso_3166_1']]))) {

        $country = new Country();
        $country->setIso31661($countryData['iso_3166_1']);
        $country->setName($countryData['name']);

        $repository->persist($country);

        $relation = new MovieCountry();
        (new MovieCountryRepository())
          ->hydrate($relation, [
            'movie_id' => $movie->getId(),
            'country_id' => $country->getId()
          ])->persist($relation);
      }
    }
  }

  protected function processCompanies(array $response, Movie $movie)
  {
    $repository = new CompanyRepository();

    foreach ($response as $companyData) {
      if (!($company = $repository->findOneByTmdbId($companyData['id']))) {

        $company = new Company();
        $company->setTmdbId($companyData['id']);
        $company->setName($companyData['name']);

        $repository->persist($company);

        $relation = new MovieCompany();
        (new MovieCompanyRepository())
          ->hydrate($relation, [
            'movie_id' => $movie->getId(),
            'company_id' => $company->getId()
          ])->persist($relation);
      }
    }
  }

  /**
   * @param array $response
   * @param Movie $movie
   */
  protected function processCollection(array $response, Movie $movie)
  {
    $repository = new CollectionRepository();

    if (!($collection = $repository->findOneByTmdbId($response['id']))) {
      $collection = new Collection();
      $repository->hydrate($collection, $this->normalizer->normalizeCollection($response));
      $repository->persist($collection);

      $images = $this->collectionApi->getImages($collection->getTmdbId());

      if (isset($images['posters'], $images['backdrops'])
        && count($images['backdrops']) > 0 && count($images['posters']) > 0
      ) {

        $posters = new CollectionPosterRepository();
        $backdrops = new CollectionBackdropRepository();

        $pictures = new PictureRepository();

        foreach ($images['posters'] as $image) {
          $picture = $this->processPicture($image, $pictures);
          $postersPersister = $posters->createInsertQuery();
          $postersPersister->ignore();
          $postersPersister->setDataBatch([
            'collection_id' => $movie->getId(),
            'picture_id' => $picture->getId(),
          ]);
          $this->connection->execute($postersPersister);
        }

        foreach ($images['backdrops'] as $image) {
          $picture = $this->processPicture($image, $pictures);
          $backdropsPersister = $backdrops->createInsertQuery();
          $backdropsPersister->ignore();
          $backdropsPersister->setDataBatch([
            'collection_id' => $movie->getId(),
            'picture_id' => $picture->getId()
          ]);
          $this->connection->execute($backdropsPersister);
        }
      }
    }

    $movie->setCollectionId($collection->getId());
    (new MovieRepository())->persist($movie);
  }

  /**
   * @param array $response
   * @param Movie $movie
   */
  protected function processSpokenLang(array $response, Movie $movie)
  {
    $repository = new LanguageRepository();

    foreach ($response as $languageData) {
      if (!($language = $repository->findOneBy([Language::ISO_639_1, $languageData['iso_639_1']]))) {

        $language = new Language();
        $language->setIso6391($languageData['iso_639_1']);
        $language->setName($languageData['name']);

        $repository->persist($language);

        $relation = new MovieLanguage();
        (new MovieLanguageRepository())
          ->hydrate($relation, [
            'movie_id' => $movie->getId(),
            'language_id' => $language->getId()
          ])->persist($relation);
      }
    }
  }

  /**
   * @param array $response
   * @param Movie $movie
   * @throws \Colibri\Exception\NotSupportedException
   */
  protected function processGenres(array $response, Movie $movie)
  {
    $repository = new GenreRepository();

    foreach ($response as $genreData) {
      if (!($genre = $repository->findOneByTmdbId($genreData['id']))) {
        $genre = new Genre();
        $repository->hydrate($genre, $this->normalizer->normalizeGenre($genreData));
        $repository->persist($genre);

        $relation = new MovieGenre();
        (new MovieGenreRepository())
          ->hydrate($relation, [
            'movie_id' => $movie->getId(),
            'genre_id' => $genre->getId()
          ])->persist($relation);
      }
    }
  }

  /**
   * @param Movie $movie
   */
  protected function processCrews(Movie $movie)
  {
    $response = $this->moviesApi->getCredits($movie->getTmdbId());

    if (isset($response['crew']) && count($response['crew']) > 0) {
      foreach ($response['crew'] as $crewItem) {
        $this->processOneCrewPerson($crewItem, $movie);
      }
    }
  }

  /**
   * @param Movie $movie
   */
  protected function processCharacters(Movie $movie)
  {
    $response = $this->moviesApi->getCredits($movie->getTmdbId());

    if (isset($response['cast']) && count($response['cast']) > 0) {
      foreach ($response['cast'] as $character) {
        $this->processOneCharacter($character, $movie);
      }
    }
  }

  /**
   * @param array $response
   * @param Movie $movie
   * @throws \Colibri\Exception\NotSupportedException
   */
  protected function processOneCrewPerson(array $response, Movie $movie)
  {
    $repository = new CrewRepository();

    $profile = $this->processProfile($response);

    $crewPerson = $repository
      ->filterByProfileId($profile->getId())
      ->filterByMovieId($movie->getId())
      ->findOne(null);

    if (!$crewPerson instanceof Crew) {
      $response = $this->normalizer->normalizeCrewPerson($response);
      $crewPerson = new Crew();
      $crewPerson->setProfileId($profile->getId())->setMovieId($movie->getId());
      $repository->hydrate($crewPerson, $response);
      $repository->persist($crewPerson);
    }
  }

  /**
   * @param array $response
   * @param Movie $movie
   * @throws \Colibri\Exception\NotSupportedException
   */
  protected function processOneCharacter(array $response, Movie $movie)
  {
    $characters = new CharacterRepository();

    $profile = $this->processProfile($response);

    $character = $characters
      ->filterByProfileId($profile->getId())
      ->filterByMovieId($movie->getId())
      ->findOne(null);

    if (!$character instanceof Character) {
      $response = $this->normalizer->normalizeCharacter($response);
      $character = new Character();
      $character->setProfileId($profile->getId())->setMovieId($movie->getId());
      $characters->hydrate($character, $response);
      $characters->persist($character);
    }
  }

  /**
   * @param array $response
   * @return Profile
   * @throws \Colibri\Exception\NotSupportedException
   */
  protected function processProfile(array $response)
  {
    $profiles = new ProfileRepository();

    if (!($profile = $profiles->findOneByTmdbId($response['id']))) {

      $profileData = $this->peopleApi->getPerson($response['id']);
      $photosData = $this->peopleApi->getImages($response['id']);

      $profile = new Profile();
      $profileData = $this->normalizer->normalizeProfile($profileData);
      $profiles->hydrate($profile, $profileData)->persist($profile);

      $this->processProfilePhotos($photosData, $profile);
    }

    return $profile;
  }

  /**
   * @param array   $response
   * @param Profile $profile
   * @throws BadCallMethodException
   * @throws \Colibri\Exception\NotSupportedException
   */
  protected function processProfilePhotos(array $response, Profile $profile)
  {
    $repository = new PhotoRepository();
    $pictures = new PictureRepository();
    $persister = $repository->createInsertQuery();

    $persister->ignore();

    if (isset($response['profiles']) && count($response['profiles']) > 0) {
      foreach ($response['profiles'] as $pictureData) {
        $picture = $this->processPicture($pictureData, $pictures);
        $persister->setDataBatch(['profile_id' => $profile->getId(), 'picture_id' => $picture->getId()]);
        $this->connection->execute($persister);
      }
    }
  }

  /**
   * @param array             $response
   * @param PictureRepository $repository
   * @return Picture
   * @throws BadCallMethodException
   */
  protected function processPicture(array $response, PictureRepository $repository)
  {
    $response = $this->normalizer->normalizePicture($response);

    if (!($picture = $this->retrievePicture($response))) {
      try {
        $picture = new Picture();
        $repository = new PictureRepository();
        $repository->hydrate($picture, $response)->persist($picture);
      } catch (\Throwable $e) {
        throw new BadCallMethodException(sprintf('[%s] %s', get_class($e), $e->getMessage()));
      }
    }

    return $picture;
  }

  /**
   * @param array $response
   * @return Picture
   */
  protected function retrievePicture(array $response)
  {
    return (new PictureRepository())->findOneByTmdbFilePath($response['tmdb_file_path']);
  }

  /**
   * @inheritdoc
   */
  protected function configure()
  {
    $this->setName('tmdb-updater');
    $this->setDescription('Iterate sequence movie id from TMDb API');

    $configuration = new ParametersCollection(include_once __DIR__ . '/../../Config/Config.php');

    if (file_exists($configuration->path('application.dev-config'))) {
      $configuration->merge(new ParametersCollection(include_once $configuration->path('application.dev-config')));
    }

    $configuration->handlePlaceholders();

    $this->config = $configuration;

    $token = new ApiToken($this->config->path('tmdb_api.token'));
    $client = new Client($token);

    $this->moviesApi = $client->getMoviesApi();
    $this->peopleApi = $client->getPeopleApi();
    $this->collectionApi = $client->getCollectionsApi();

    $this->normalizer = new TmdbDataNormalizer();

    $this->colibri = ColibriORM::getServiceContainer();
    $this->connection = $this->colibri->getConnection();
  }

  /**
   * @param OutputInterface $output
   * @param                 $countLines
   * @return ProgressBar
   */
  protected function getProgressBar(OutputInterface $output, $countLines)
  {
    $progress = new ProgressBar($output, $countLines);

    $progress->setFormat("\n%message%\n\n<info>%bar%</info>\n\n");
    $progress->setBarWidth(80);
    $progress->setBarCharacter("▓");
    $progress->setProgressCharacter("▓");
    $progress->setEmptyBarCharacter("░");

    return $progress;
  }

}