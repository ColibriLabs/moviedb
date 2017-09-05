<?php

namespace ColibriLabs\Bin\Command;

use Colibri\ColibriORM;
use Colibri\Connection\ConnectionInterface;
use Colibri\Parameters\ParametersCollection;
use Colibri\ServiceContainer\ServiceLocator;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\PictureRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TmdbUpdateFiles
 * @package ColibriLabs\Bin\Command
 */
class TmdbUpdateFiles extends Command
{
  
  /**
   * @var ServiceLocator
   */
  protected $colibri;
  /**
   * @var ConnectionInterface
   */
  protected $connection;
  /**
   * @var ParametersCollection
   */
  protected $config;
  
  /**
   * @inheritdoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $repository = new PictureRepository();
    $repository
      ->getQuery()
      ->isNull(Picture::FILE_PATH)
      ->orderBy(Picture::ID);

    /** @var Picture $picture */
    foreach ($repository->findAll() as $picture) {
      $picture->setConfiguration($this->config);
      $repository->persist($picture);
      $output->writeln(sprintf('ID:%d [%s] (%s)',
        $picture->getId(), $picture->getPicturePath(), static::bytes(filesize($picture->getAbsolutePath()))));
    }
    
  }
  
  /**
   * @param $bytes
   * @return string
   */
  public static function bytes($bytes)
  {
    $names = ['B', 'K', 'M', 'G', 'T'];
    $scale = (integer)log($bytes, 1024);
    
    return round($bytes / pow(1024, $scale), 2) . $names[$scale];
  }
  
  /**
   * @inheritdoc
   */
  protected function configure()
  {
    $this->setName('tmdb-upload-pictures');
    $this->setDescription('Upload pictures from TMDb');
    
    $configuration = new ParametersCollection(include __DIR__ . '/../../Config/Config.php');
    
    if (file_exists($configuration->path('application.dev-config'))) {
      $configuration->merge(new ParametersCollection(include $configuration->path('application.dev-config')));
    }
    
    $configuration->handlePlaceholders();
    
    $this->config = $configuration;
    
    $this->colibri = ColibriORM::getServiceContainer();
    $this->connection = $this->colibri->getConnection();
  }
  
}