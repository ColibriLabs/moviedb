<?php

namespace ColibriLabs\Controller;

use Colibri\Pagination\Paginator;
use Colibri\Query\Expr\Column;
use Colibri\Query\Expr\Func\Year;
use Colibri\Query\Statement\Comparison\Comparison;
use Colibri\Query\Statement\Where;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Lib\ControllerWeb;
use ColibriLabs\Lib\Grid\Grid;

/**
 * Class DiscoverController
 *
 * @package ColibriLabs\Controller
 */
class DiscoverController extends ControllerWeb
{
  
  /**
   * @var array
   */
  protected $filterMap = [
    Grid::LIKE => Comparison::LIKE,
    Grid::EQ => Comparison::EQ,
    Grid::GT => Comparison::GT,
    Grid::GE => Comparison::GTE,
    Grid::LT => Comparison::LT,
    Grid::LE => Comparison::LTE,
  ];
  
  /**
   * @return void
   */
  public function beforeExecute()
  {
    parent::beforeExecute();
    
    $this->setLayout('layout');
  }
  
  /**
   * Search result
   */
  public function searchAction()
  {
    $repository = new MovieRepository();
    $query = $repository->getQuery();
    
    $query->orderBy(Movie::BUDGET, 'DESC');
    
    $grid = new Grid($this->url);
    $grid->processRequest($this->request->getServer('request_uri'));
    
    $filter = $grid->getGridFilter();
    
    foreach ($filter->getFilters() as $name => $filterChain) {
      foreach ($filterChain as $comparator => $filters) {
        $subQuery = $query->sub();
        foreach ($filters as $filterValue) {
          $this->applyFilterCriteria($name, $comparator, $filterValue, $subQuery);
        }
      }
    }
//    die($query->toSQL());
    
    $pagination = new Paginator($repository);
    $pagination->setCountPerPage(60);
    $pagination->setCurrentPage($this->request->getQuery('page', 1));
    
    $pagination->processRepository();
    
    $repository->processCompleteQuery();
    
    $this->view->set('pagination', $pagination);
  }
  
  /**
   * @param string $column
   * @param string $comparator
   * @param string $filterValue
   * @param Where $query
   * @return $this
   */
  private function applyFilterCriteria($column, $comparator, $filterValue, Where $query)
  {
    $filterValue = urldecode($filterValue);
    
    switch ($column) {
      
      case Movie::TITLE_KEY:
        if ($comparator === Grid::LIKE && strpos($filterValue, "\x20") !== false) {
          $filterValue = preg_replace('/\s+/ui', '%', $filterValue);
          $filterValue = "%{$filterValue}%";
        }
        $query->where($column, $filterValue, $this->filterMap[$comparator]);
        break;
        
      case Movie::RELEASE_DATE_KEY:
        $query->where(new Year(new Column($column)), $filterValue, $this->filterMap[$comparator]);
        break;
        
      default:
        $query->where($column, $filterValue, $this->filterMap[$comparator]);
        break;
    }
    
    return $this;
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
      var_dump($parameters);
      foreach ($parameters as $parameterName => $parameterValues) {
        if (is_array($parameterValues)) {
          foreach ($parameterValues as $parameterValue) {
            $comparator = Grid::EQ;
            
            if (is_array($parameterValue)) {
              list($parameterValue, $comparator) = $parameterValue;
            }
            
            $filter->append($parameterName, $parameterValue, $comparator);
          }
        } else {
          $filter->append($parameterName, $parameterValues);
        }
      }
    }
    
    $this->redirect($filter->render());
  }
  
}