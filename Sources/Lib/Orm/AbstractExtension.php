<?php

namespace ColibriLabs\Lib\Orm;

use Colibri\EventDispatcher\EventSubscriber;
use Colibri\Parameters\ParametersCollection;

/**
 * Class AbstractExtension
 * @package ColibriLabs\Lib\Orm
 */
abstract class AbstractExtension implements ExtensionInterface, EventSubscriber
{
  
  /**
   * @var ParametersCollection
   */
  protected $configuration;
  
  /**
   * AbstractExtension constructor.
   * @param ParametersCollection $configuration
   */
  public function __construct(ParametersCollection $configuration)
  {
    $this->setConfiguration($configuration->path(sprintf('extensions.%s', $this->getNameNS())));
  }
  
  /**
   * @inheritDoc
   */
  public function setConfiguration(ParametersCollection $collection)
  {
    $this->configuration = $collection;
    
    return $this;
  }
  
  /**
   * @inheritDoc
   */
  public function getConfiguration()
  {
    return $this->configuration;
  }
  
}