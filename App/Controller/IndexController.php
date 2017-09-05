<?php

namespace ColibriLabs\Controller;

use ColibriLabs\Lib\ControllerWeb;

/**
 * Class IndexController
 * @package ColibriLabs\Controller
 */
class IndexController extends ControllerWeb
{
  
  public function beforeExecute()
  {
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $this->setLayout('layout');
  }
  
  /**
   * @param null|string $hash
   * @return mixed
   */
  public function indexAction($hash = null)
  {
    return '<h1>lostDB - Movie Database</h1>';
  }
  
}