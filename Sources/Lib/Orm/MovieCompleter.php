<?php

namespace ColibriLabs\Lib\Orm;

use Colibri\Core\Event\EntityLifecycleEvent;
use Colibri\Core\ORMEvents;
use Colibri\Parameters\ParametersCollection;
use ColibriLabs\Database\Om\Genre;
use ColibriLabs\Database\Om\GenreRepository;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieGenre;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Database\Om\PictureRepository;

/**
 * Class MovieCompleter
 * @package ColibriLabs\Lib\Orm
 */
class MovieCompleter extends AbstractExtension
{
  
  /**
   * @var PictureRepository
   */
  private $pictures;
  
  /**
   * @var GenreRepository
   */
  private $genres;
  
  /**
   * @var MovieRepository
   */
  private $movies;
  
  /**
   * MovieCompleter constructor.
   * @param ParametersCollection $configuration
   */
  public function __construct(ParametersCollection $configuration)
  {
    parent::__construct($configuration);
    
    $this->pictures = new PictureRepository();
    $this->genres   = new GenreRepository();
    $this->movies   = new MovieRepository();
  }
  
  /**
   * @return array
   */
  public function getEvents()
  {
    return [ORMEvents::onEntityLoad];
  }

  /**
   * @return mixed
   */
  public function getNameNS()
  {
    return static::class;
  }
  
  /**
   * @param EntityLifecycleEvent $event
   */
  public function onEntityLoad(EntityLifecycleEvent $event)
  {
    /** @var Movie $movie */
    if (($movie = $event->getEntity()) instanceof Movie) {
      $this->completePictures($movie)->completeGenres($movie);
      $movie->setRepository($this->movies);
    }
  }
  
  /**
   * @param Movie $movie
   * @return $this
   */
  private function completeGenres(Movie $movie)
  {
    $repository = $this->genres;
    
    $repository->getQuery()
      ->innerJoin(MovieGenre::TABLE, [Genre::ID, MovieGenre::GENRE_ID])
      ->where(MovieGenre::MOVIE_ID, $movie->getId())
    ;
    
    $movie->setGenres($repository->findAll()->getCollection());
    
    return $this;
  }
  
  /**
   * @param Movie $movie
   * @return $this
   */
  private function completePictures(Movie $movie)
  {
    $this->pictures->injectBackdropForMovie($movie);
    $this->pictures->injectPosterForMovie($movie);
    
    return $this;
  }
  
}