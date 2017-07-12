<?php

namespace ColibriLabs\Lib\Orm;

use Colibri\Core\Event\EntityLifecycleEvent;
use Colibri\Core\ORMEvents;
use Colibri\Parameters\ParametersCollection;
use ColibriLabs\Database\Om\Picture;

class PictureCompleter extends AbstractExtension
{
  
  /**
   * @var ParametersCollection
   */
  private $applicationConfiguration;
  
  /**
   * PictureEntityInjection constructor.
   * @param ParametersCollection $configuration
   * @param ParametersCollection $applicationConfiguration
   */
  public function __construct(ParametersCollection $configuration, ParametersCollection $applicationConfiguration)
  {
    parent::__construct($configuration);
    
    $this->applicationConfiguration = $applicationConfiguration;
  }
  
  /**
   * @return array
   */
  public function getEvents()
  {
    return [ORMEvents::onEntityLoad];
  }
  
  /**
   * @return mixed
   */
  public function getNameNS()
  {
    return static::class;
  }
  
  /**
   * @param EntityLifecycleEvent $event
   */
  public function onEntityLoad(EntityLifecycleEvent $event)
  {
    if ($event->getEntity() instanceof Picture) {
      $event->getEntity()->setVirtual('configuration', $this->applicationConfiguration);
    }
  }
  
}