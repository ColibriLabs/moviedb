<?php

namespace ColibriLabs\Controller;

use Behat\Transliterator\Transliterator;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
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
   */
  public function indexAction($movieId)
  {
    /** @var Movie $movie */
    $movie = $this->movies->retrieve($movieId);
    $slug = Transliterator::urlize(Transliterator::transliterate($movie->getTitle()));

    $this->redirect(sprintf('movie/%d/%s', $movieId, $slug));
  }

  /**
   * @param $movieId
   * @param $slug
   */
  public function itemAction($movieId, $slug)
  {
    $repository = new MovieRepository();
    $movie = $repository->getMovieById($movieId);
  
    $this->setLayout('movie-layout');
    $this->view->set('movie', $movie);
  }

  public function exploreAction()
  {
    $this->movies->orderByBudget('DESC');
    $this->movies->getFilterQuery()->setLimit(30);
    $collection = $this->movies->findAll()->getCollection();

    $this->view->set('movies', $collection);
    $this->view->set('posters', $this->posters->getTmdbPictureCollection($collection));
  }

}