<?php

namespace ColibriLabs\Controller;

use Colibri\Core\Entity\RepositoryInterface;
use Colibri\Http\Response;
use Colibri\Pagination\Paginator;
use Colibri\Query\Statement\OrderBy;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Lib\ControllerWeb;

use ColibriLabs\Lib\Util\BaseConverter;
use ColibriLabs\Lib\Util\BigIntPack;
use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\ConfigurationRepository;
use Tmdb\Repository\MovieRepository as TmdbMovieRepository;

/**
 * Class IndexController
 * @package ColibriLabs\Controller
 */
class IndexController extends ControllerWeb
{
  
  public function beforeExecute()
  {
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $this->setLayout('layout');
  }
  
  public function indexAction()
  {
    $converter = BaseConverter::instance();
    
    $id = 27266;
    $w = 801;
    $h = 1380;
    
    $int = BigIntPack::pack($id, $w, $h);
    
    var_dump($int, $converter->encode($int), BigIntPack::unpack($converter->decode('qVP028n0'))); die;
  }
    
}