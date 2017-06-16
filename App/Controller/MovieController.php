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
    /** @var Movie $movie */
    $repository = new MovieRepository();
    $movie = $repository->getMovieById($movieId);
    
    $poster = $movie->getPoster();
    $absolutePath = $poster->getAbsolutePath($this->config['pictures_root']);
    
    if (!file_exists($absolutePath)) {
      file_put_contents($absolutePath, file_get_contents($poster->getTmdbPicturePath(), FILE_BINARY));
    }
    
    $this->setLayout('movie-layout');
    $this->view->set('movie', $movie);
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
    $this->movies->orderByBudget('DESC');
    $this->movies->getFilterQuery()->setLimit(30);
    $collection = $this->movies->findAll()->getCollection();

    $this->view->set('movies', $collection);
    $this->view->set('posters', $this->posters->getTmdbPictureCollection($collection));
  }

}