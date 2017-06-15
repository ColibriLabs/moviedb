<?php

namespace ColibriLabs\Controller;

use Colibri\Html\Element\ImgElement;
use ColibriLabs\Database\Om\Picture;
use ColibriLabs\Database\Om\PictureRepository;
use ColibriLabs\Lib\ControllerWeb;

/**
 * Class PictureController
 * @package ColibriLabs\Controller
 */
class PictureController extends ControllerWeb
{
  
  /**
   * @param integer $pictureId
   * @return mixed
   */
  public function indexAction($pictureId)
  {
    /** @var Picture $picture */
    $repository = new PictureRepository();
    $picture = $repository->retrieve($pictureId);
    
    $base64 = 'data:image/jpeg;base64,%s';
    
    return new ImgElement(sprintf($base64, base64_encode(file_get_contents($picture->getTmdbPicturePath()))));
  }
  
}