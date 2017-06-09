<?php

namespace ColibriLabs\Bin\Command;

use Colibri\Common\DateTime;
use Colibri\Parameters\ParametersCollection;

use ColibriLabs\Bin\Lib\TmdbDataNormalizer;
use ColibriLabs\Database\Om\CharacterRepository;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Database\Om\ProfileRepository;
use ColibriLabs\Lib\Util\Profiler;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
   * @var Client
   */
  protected $client;
  
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
  
    try {
      $movieArray = $this->client->getMoviesApi()->getMovie(155);
      $this->processMovie($movieArray);
    } catch (\Exception $exception) {
      $output->writeln($exception->getMessage());
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
    
    $this->processCharacters($movie);
    
    return $movie;
  }
  
  protected function processCharacters(Movie $movie)
  {
    $response = $this->client->getMoviesApi()->getCredits($movie->getTmdbId());
    
    if (isset($response['cast']) && count($response['cast']) > 0) {
      foreach ($response['cast'] as $character) {
        $this->processCharacter($character);
      }
    }
  }
  
  protected function processCharacter(array $characterArray)
  {
    $characterRepository = new CharacterRepository();
    $profileRepository = new ProfileRepository();
    
    if (!($profile = $profileRepository->findOneByTmdbId($characterArray['id']))) {
      
    }
    
    $character = $characterRepository->filterByProfileId($profile->getId());
  }
  
  protected function processProfile(array $characterArray)
  {
    
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
    $this->client = new Client($token);
    
    $this->normalizer = new TmdbDataNormalizer();
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