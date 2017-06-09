<?php

namespace ColibriLabs\Lib\Orm;

use Colibri\Core\Event\EntityLifecycleEvent;
use Colibri\Core\ORMEvents;

/**
 * Class Versionable
 *
 * @package  ColibriLabs\Lib\Orm
 */
class Versionable extends AbstractExtension
{
  
  /**
   * @return array
   */
  public function getEvents()
  {
    return [ORMEvents::beforePersist];
  }
  
  /**
   * @inheritDoc
   */
  public function getNameNS()
  {
    return 'versionable';
  }
  
  /**
   * @param EntityLifecycleEvent $event
   */
  public function beforePersist(EntityLifecycleEvent $event)
  {
    foreach ($this->getConfiguration() as $entityClassName => $properties) {
      if ($event->getEntity() instanceof $entityClassName) {
        $entity = $event->getEntity();
        foreach ($properties->get('properties') as $propertyName) {
          $version = $entity->getByProperty($propertyName);
          $entity->setByProperty($propertyName, $version + 1);
        }
      }
    }
  }

}