<?php

/**
 * Generated By ColibriORM Generator
 * @author Ivan Gontarenko
*/

namespace ColibriLabs\Database\Om\Base;

use Colibri\Core\Entity;

/**
 * Entity class for representation table 'languages'
 */
class BaseLanguage extends Entity
{

  const TABLE = 'languages';

  const ID = 'languages.id';
  const ISO_639_1 = 'languages.iso_639_1';
  const NAME = 'languages.name';
  const VERSION = 'languages.version';
  const CREATED = 'languages.created';
  const UPDATED = 'languages.updated';
  const ID_KEY = 'id';
  const ISO_639_1_KEY = 'iso_639_1';
  const NAME_KEY = 'name';
  const VERSION_KEY = 'version';
  const CREATED_KEY = 'created';
  const UPDATED_KEY = 'updated';
  
  /**
   * @var integer
   */
  public $id;
  
  /**
   * @var string
   */
  public $iso6391;
  
  /**
   * @var string
   */
  public $name;
  
  /**
   * @var integer
   */
  public $version;
  
  /**
   * @var string
   */
  public $created;
  
  /**
   * @var string
   */
  public $updated;

  /**
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getIso6391()
  {
    return $this->iso6391;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return integer
   */
  public function getVersion()
  {
    return $this->version;
  }

  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }

  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }


  /**
   * @param integer $id
   * @return $this
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * @param string $iso6391
   * @return $this
   */
  public function setIso6391($iso6391)
  {
    $this->iso6391 = $iso6391;

    return $this;
  }

  /**
   * @param string $name
   * @return $this
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * @param integer $version
   * @return $this
   */
  public function setVersion($version)
  {
    $this->version = $version;

    return $this;
  }

  /**
   * @param string $created
   * @return $this
   */
  public function setCreated($created)
  {
    $this->created = $created;

    return $this;
  }

  /**
   * @param string $updated
   * @return $this
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;

    return $this;
  }

}