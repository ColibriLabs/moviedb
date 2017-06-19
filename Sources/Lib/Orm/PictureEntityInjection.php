<?php

namespace ColibriLabs\Lib\Orm;

use Colibri\Core\Event\EntityLifecycleEvent;
use Colibri\Core\ORMEvents;
use Colibri\Parameters\ParametersCollection;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\PictureRepository;

/**
 * Class PictureEntityInjection
 * @package ColibriLabs\Lib\Orm
 */
class PictureEntityInjection extends AbstractExtension
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
    return 'picture_entity';
  }

  public function onEntityLoad(EntityLifecycleEvent $event)
  {
    if ($event->getEntity() instanceof Picture) {
      $event->getEntity()->setVirtual('configuration', $this->applicationConfiguration);
    }

    if (($movie = $event->getEntity()) instanceof Movie) {
      $repository = new PictureRepository();
      $repository->injectBackdropForMovie($movie);
      $repository->injectPosterForMovie($movie);
    }
  }

}