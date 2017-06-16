<?php

namespace ColibriLabs\Lib\Util;

/**
 * Class BaseConverter
 * @package ColibriLabs\Lib\Util
 */
class BaseConverter
{
  
  const USE_UPPERCASE = 1;
  const USE_LOWERCASE = 2;
  const USE_NUMS = 4;
  const USE_NUMS_WO_ZERO = 8;
  
  /**
   * @var array
   */
  private $map = [];
  
  /**
   * @var int
   */
  private $size = 0;
  
  /**
   * BaseX constructor.
   * @param int $mode
   */
  public function __construct($mode = 0)
  {
    $this->map = ["\0"];
    
    if ($mode & self::USE_NUMS) {
      $this->map = array_merge($this->map, range('0', '9'));
    } else if ($mode & self::USE_NUMS_WO_ZERO) {
      $this->map = array_merge($this->map, range('1', '9'));
    }
    
    if ($mode & self::USE_LOWERCASE) {
      $this->map = array_merge($this->map, range('a', 'z'));
    }
    
    if ($mode & self::USE_UPPERCASE) {
      $this->map = array_merge($this->map, range('A', 'Z'));
    }
    
    unset($this->map[0]);
    
    $this->map = array_map(function($value) { return (string) $value; }, $this->map);
    
    $this->size = count($this->map);
  }
  
  /**
   * @return static
   */
  static public function instance()
  {
    static $instance;
    
    if (!$instance) {
      $mask = static::USE_LOWERCASE | static::USE_UPPERCASE | static::USE_NUMS;
      $instance = new BaseConverter($mask);
    }
    
    return $instance;
  }
  
  
  /**
   * @param array $symbols
   * @return $this
   */
  public function append(array $symbols)
  {
    $this->map = array_unique(array_merge($this->map, $symbols));
    $this->size = count($this->map);
    
    return $this;
  }
  
  /**
   * @param array $symbols
   * @return $this
   */
  public function prepend(array $symbols)
  {
    $this->map = array_unique(array_merge($symbols, $this->map));
    $this->size = count($this->map);
    
    return $this;
  }
  
  /**
   * @param int $intData
   * @return int|string
   */
  public function encode($intData = 0)
  {
    $stringMap = implode($this->map);
    $encoded = null;
    
   if ($intData > 0) {
     
     do {
       $encoded = $stringMap[bcmod($intData, $this->size)] . $encoded;
       $intData = bcdiv($intData, $this->size, 0);
    
       if ($intData == 0) break;
     } while (true);
     
     return $encoded;
   }
    
   return current($this->map);
  }
  
  /**
   * @param string $data
   * @return int|string
   */
  public function decode($data = '')
  {
    $length = mb_strlen($data) - 1;
    $mapStr = implode($this->map);
    $decoded = 0;
    
    if ($length > 0) {
      
      $data = strrev($data);
      for ($i = 0; $i <= $length; $i++) {
        $symbol     = $data[$i];
        $position   = mb_strpos($mapStr, $symbol);
        $decoded    = bcadd($decoded, bcmul($position, bcpow($this->size, $i, 0), 0), 0);
      }
  
      return $decoded;
    }
  
    return $decoded;
  }
  
}