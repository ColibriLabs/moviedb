<?php

namespace ColibriLabs\Bin\Command;

use Colibri\ColibriORM;
use Colibri\Common\DateTime;
use Colibri\Exception\BadCallMethodException;
use Colibri\Parameters\ParametersCollection;

use Colibri\ServiceContainer\ServiceLocator;
use ColibriLabs\Bin\Lib\TmdbDataNormalizer;
use ColibriLabs\Database\Om\Character;
use ColibriLabs\Database\Om\CharacterRepository;
use ColibriLabs\Database\Om\Crew;
use ColibriLabs\Database\Om\CrewRepository;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Database\Om\Photo;
use ColibriLabs\Database\Om\PhotoRepository;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\PictureRepository;
use ColibriLabs\Database\Om\Profile;
use ColibriLabs\Database\Om\ProfileRepository;
use ColibriLabs\Lib\Util\Profiler;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Tmdb\Api\Movies;
use Tmdb\Api\People;
use Tmdb\ApiToken;
use Tmdb\Client;

/**
 * Class TmdbUpdater
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
   * @var TmdbDataNormalizer
   */
  protected $normalizer;
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    Profiler::timerStart();
    
    $this->colibri->getConnection()->start();
    
    try {
      $movieArray = $this->moviesApi->getMovie(153);
      $this->processMovie($movieArray);
      $this->colibri->getConnection()->commit();
    } catch (\Exception $exception) {
      $output->writeln(sprintf("%s\n%s", $exception->getMessage(), $exception->getTraceAsString()));
    }
    
    $output->writeln(sprintf('Finished! Time spend: %s', Profiler::timeSpendHumanize()));
  }
  
  /**
   * @param array $movieResponse
   * @return Movie
   */
  protected function processMovie(array $movieResponse)
  {
    
    $repository = new MovieRepository();
    
    if (!($movie = $repository->findOneByTmdbId($movieResponse['id']))) {
      $data = $this->normalizer->normalizeMovie($movieResponse);
  
      $movie = new Movie();
      $repository->hydrate($movie, $data);
      $repository->persist($movie);
    }
    
//    $this->processCharacters($movie);
    $this->processCrews($movie);
    
    return $movie;
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

      $dict = [];

      foreach($photosData['profiles'] as $item) {
        if (isset($dict[$item['file_path']])) {
          var_dump($photosData); die;
        }
        $dict[$item['file_path']] = 1;
      }

      $profile = new Profile();
      $profileData = $this->normalizer->normalizeProfile($profileData);
      $profiles->hydrate($profile, $profileData)->persist($profile);

      $this->processProfilePhotos($photosData, $profile);
    }

    return $profile;
  }

  /**
   * @param array $response
   * @param Profile $profile
   * @throws BadCallMethodException
   * @throws \Colibri\Exception\NotSupportedException
   */
  protected function processProfilePhotos(array $response, Profile $profile)
  {
    $repository = new PhotoRepository();
    $pictures = new PictureRepository();

    if (isset($response['profiles']) && count($response['profiles']) > 0) {
      foreach ($response['profiles'] as $pictureData) {
        $picture = $this->processPicture($pictureData, $pictures);
        
        $photo = new Photo();
        $photo->setProfileId($profile->getId())->setPictureId($picture->getId());
        
        $repository->persist($photo);
      }
    }
  }

  /**
   * @param array $response
   * @param PictureRepository $repository
   * @return Picture
   * @throws BadCallMethodException
   */
  protected function processPicture(array $response, PictureRepository $repository)
  {
    $picture = new Picture();
    $response = $this->normalizer->normalizePicture($response);

    $connection = $this->colibri->getConnection();

    $datetime = new DateTime();
    $datetime->setFormat('Y-m-d H:i:s');

    $response['created'] = $datetime;
    $response['updated'] = $datetime;
    $response['version'] = 1;
    
    try {
      $persister = $repository->getPersisterForEntity($picture);

      $persister->ignore();
      $persister->setDataBatch($response);

      $connection->execute($persister);

      $repository->hydrate($picture, $response);

      if (1 > ($lastId = $connection->lastInsertId())) {
        return $this->retrievePicture($response);
      }

      $picture->setId($lastId);

    } catch (\Throwable $e) {
      throw new BadCallMethodException(sprintf('[%s] %s', get_class($e), $e->getMessage()));
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
    
    $this->normalizer = new TmdbDataNormalizer();
    
    $this->colibri = ColibriORM::getServiceContainer();
  }
  
  /**
   * @param OutputInterface $output
   * @param $countLines
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