<?php

namespace ColibriLabs\Controller;

use Colibri\Connection\Stmt;
use Colibri\Query\Builder\Select;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Lib\ControllerWeb;

/**
 * Class StatsController
 *
 * @package ColibriLabs\Controller
 */
class StatsController extends ControllerWeb
{

  public function dbAction()
  {
    $this->setLayout('layout');

    $select = new Select($this->colibri->getConnection());

    $select->count(Movie::ID, null);
    $select->setFromTable(Movie::TABLE);

    /** @var Stmt $statement */
    $statement = $this->colibri->getConnection()->query($select);

    $this->view->set('moviesCount', $statement->loadColumn());
  }
  
}