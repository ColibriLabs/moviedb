<?php

namespace ColibriLabs\Bin\Command;

use Colibri\Parameters\ParametersCollection;

use ColibriLabs\Lib\Util\Profiler;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\ConfigurationRepository;
use Tmdb\Repository\MovieRepository;

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
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $token = new ApiToken($this->config->path('tmdb_api.token'));
    $client = new Client($token);

    $configRepository = new ConfigurationRepository($client);
    $helper = new ImageHelper($configRepository->load());
    
    $api = $client->getMoviesApi();
  
    $repository = new MovieRepository($client);
    /** @var \Tmdb\Model\Movie $movie */

    $filesystem = new Filesystem(new Local($this->config->path('tmdb_root')));
    
    Profiler::timerStart();
    
    $until = 500000;
    
    for ($i = 1; $i < $until; $i++) {

      try {
        $movieData = [
          'movie' => $api->getMovie($i),
          'credits' => $api->getCredits($i),
          'images' => $api->getImages($i),
        ];
        
        $jsonFile = sprintf('movies/id_%d.json', $i);
        
        $filesystem->write($jsonFile, json_encode($movieData, JSON_PRETTY_PRINT));
        
        $output->writeln(sprintf('[ID%d] Left: %d', $i, $until - $i));
      } catch (\Throwable $exception) {
        $output->writeln($exception->getMessage());
      }
    }
  }
  
  /**
   * @param $seconds
   * @return string
   */
  private static function secondsToHumanize($seconds)
  {
    return sprintf('%dh %sm %ss', (integer) $seconds / 3600, (integer) (($seconds % 3600) / 60), (integer) ($seconds % 60));
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