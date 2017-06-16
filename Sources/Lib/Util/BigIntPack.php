<?php

namespace ColibriLabs\Lib\Util;

/**
 * Class BigIntPack
 * @package ColibriLabs\Lib\Util
 */
class BigIntPack
{
  
  /**
   * @param int $intA24
   * @param int $intB16
   * @param int $intC16
   * @return int
   */
  public static function pack($intA24, $intB16, $intC16)
  {
    return $intA24 | ($intB16 << 24) | ($intC16 << 36);
  }
  
  /**
   * @param $bigint
   * @return array|integer[]
   */
  public static function unpack($bigint)
  {
    return [$bigint & 0xffffff, ($bigint >> 24) & 0xfff, ($bigint >> 36) & 0xfff];
  }
  
}