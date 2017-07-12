<?php

namespace ColibriLabs\Controller;

use ColibriLabs\Lib\ControllerWeb;
use ColibriLabs\Lib\Grid\Grid;

/**
 * Class DiscoverController
 * @package ColibriLabs\Controller
 */
class DiscoverController extends ControllerWeb
{
  
  public function searchAction()
  {
    $grid = new Grid($this->url);
    $grid->processRequest($this->request->getServer('request_uri'));
    
    $filter = $grid->getGridFilter();

    return $filter->render();
  }
  
  /**
   * Apply parameters and redirect to search action
   */
  public function parametersApplyAction()
  {
    $grid = new Grid($this->url);
    $grid->setPrefixPath($this->url->create('discover:search'));
    
    $filter = $grid->getGridFilter();
    
    if ($parameters = $this->request->getQuery('parameters')) {
      foreach ($parameters as $parameterName => $parameterValues) {
        if (is_array($parameterValues)) {
          foreach ($parameterValues as $parameterValue) {
            $filter->append($parameterName, $parameterValue);
          }
        } else {
          $filter->append($parameterName, $parameterValues);
        }
      }
    }
    
    $this->redirect($filter->render());
  }
  
}