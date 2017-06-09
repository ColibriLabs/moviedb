<?php

namespace ColibriLabs\Lib\Orm;

use Colibri\Parameters\ParametersCollection;

/**
 * Interface ExtensionInterface
 *
 * @package  ColibriLabs\Lib\Orm
 */
interface ExtensionInterface
{

  /**
   * @param ParametersCollection $collection
   * @return mixed
   */
  public function setConfiguration(ParametersCollection $collection);
  
  /**
   * @return ParametersCollection
   */
  public function getConfiguration();
  
  /**
   * @return string
   */
  public function getNameNS();

}