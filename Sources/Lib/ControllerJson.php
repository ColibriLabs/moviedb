<?php

namespace ColibriLabs\Lib;

use Colibri\Http\Response;
use Colibri\WebApp\Controller;

/**
 * Class ControllerJson
 * @package ColibriLabs\Lib
 */
class ControllerJson extends Controller
{
  
  /**
   *
   */
  public function beforeExecute()
  {
    $this->response->setBodyFormat(Response::RESPONSE_JSON);
  }
  
}