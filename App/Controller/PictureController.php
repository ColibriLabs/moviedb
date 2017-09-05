<?php

namespace ColibriLabs\Controller;

use Colibri\Collection\Collection;
use Colibri\Html\Element\ImgElement;
use Colibri\Parameters\ParametersCollection;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\PictureRepository;
use ColibriLabs\Database\Om\Poster;
use ColibriLabs\Lib\ControllerWeb;

/**
 * Class PictureController
 * @package ColibriLabs\Controller
 */
class PictureController extends ControllerWeb
{
  
  public function movieAction($movieId)
  {
    /** @var Picture $picture */
    $repository = new PictureRepository();
    $query = $repository->getQuery();
  
    $query->innerJoin(Poster::TABLE, [Picture::ID, Poster::PICTURE_ID]);
    $query->where(Poster::MOVIE_ID, $movieId);
  
    $collection = [];
    
    foreach ($repository->findAll() as $picture) {
      $collection[$picture->getIso6391()][] = $picture->toArray();
    }
  
    $collection = new ParametersCollection($collection);
    
    die($collection->toYaml());
  }
  
  /**
   * @param integer $pictureId
   * @return mixed
   */
  public function indexAction($pictureId)
  {
    /** @var Picture $picture */
    $repository = new PictureRepository();
    $picture = $repository->retrieve($pictureId);
    $picture->setConfiguration($this->config);
    
    $base64 = 'data:image/jpeg;base64,%s';
    
    return new ImgElement(sprintf($base64, base64_encode(file_get_contents($picture->getAbsolutePath()))));
  }
  
}