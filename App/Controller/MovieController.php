<?php

namespace ColibriLabs\Controller;

use Behat\Transliterator\Transliterator;
use Colibri\Pagination\Paginator;
use Colibri\Query\Builder\Select;
use Colibri\Query\Expr\Column;
use Colibri\Query\Expr\Func\Concat;
use Colibri\Query\Expr\Func\Rand;
use Colibri\Query\Expr\Subquery;
use ColibriLabs\Database\Om\Backdrop;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\Poster;
use ColibriLabs\Database\Om\PosterRepository;
use ColibriLabs\Lib\ControllerWeb;

/**
 * Class MovieController
 * @package ColibriLabs\Controller
 */
class MovieController extends ControllerWeb
{

  /**
   * @var MovieRepository
   */
  private $movies;

  /**
   * @var PosterRepository
   */
  private $posters;

  /**
   * @return void
   */
  public function beforeExecute()
  {
    parent::beforeExecute();

    $this->setLayout('layout');
    $this->movies = new MovieRepository();
    $this->posters = new PosterRepository();
  }

  /**
   * @param $movieId
   * @param $slug
   */
  public function itemAction($movieId, $slug = null)
  {
    $this->setLayout('movie-layout');
    $this->view->set('movie', $this->movies->getFullMovieItemByID($movieId));
  }
  
  /**
   * @return void
   */
  public function lastAction()
  {
    $repository = new MovieRepository();
    $repository->orderById('DESC');
    
    /** @var Movie $movie */
    $movie = $repository->findOne(null);

    $this->itemAction($movie->getId(), $movie->getTitleSlug());
  }
  
  /**
   * @return void
   */
  public function exploreAction()
  {
    $this->getRepository()->getQuery()
      ->orderBy(Movie::BUDGET, 'DESC');

    $pagination = new Paginator($this->getRepository());
    $pagination->setCountPerPage(60);
    $pagination->setCurrentPage($this->request->getQuery('page', 1));

    $pagination->processRepository();

    $this->getRepository()->processCompleteQuery();
    
    $this->view->set('pagination', $pagination);
  }

  /**
   * @return void
   */
  public function randomAction()
  {
    $this->movies->orderBy([new Rand()]);
    $this->movies->getQuery()->setLimit(30);
    $collection = $this->movies->findAll()->getCollection();

    $this->view->set('movies', $collection);
  }

  /**
   * @return MovieRepository
   */
  private function getRepository()
  {
    return $this->movies;
  }

}