<?php

namespace ColibriLabs\Bin;

use Colibri\ColibriORM;
use Colibri\Common\Configuration;
use ColibriLabs\Lib\Orm\Sluggable;
use ColibriLabs\Lib\Orm\Timestampable;
use ColibriLabs\Lib\Orm\Versionable;
use Symfony\Component\Console\Application;

/**
 * Class UpdaterApplication
 * @package ColibriLabs\Bin
 */
class UpdaterApplication extends Application
{
  
  /**
   * UpdaterApplication constructor.
   * @param string $name
   * @param string $version
   */
  public function __construct($name = 'UNKNOWN', $version = 'UNKNOWN')
  {
    parent::__construct($name, $version);
  
    $configuration = Configuration::createFromFile(__DIR__ . '/../Config/Orm.php');
    ColibriORM::initialize($configuration);
  
    $developmentFile = $configuration->path('colibri_orm.dev_configuration');
    file_exists($developmentFile)
    && $configuration->merge(Configuration::createFromFile($developmentFile));
  
    $configuration->handlePlaceholders();
    
    ColibriORM::getServiceContainer()->getDispatcher()
      ->subscribeListener(new Timestampable($configuration))
      ->subscribeListener(new Versionable($configuration))
      ->subscribeListener(new Sluggable($configuration))
    ;
  }
  
}