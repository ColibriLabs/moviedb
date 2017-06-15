<?php

namespace ColibriLabs\Controller;

use Colibri\Core\Entity\RepositoryInterface;
use Colibri\Http\Response;
use Colibri\Pagination\Paginator;
use Colibri\Query\Statement\OrderBy;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Lib\ControllerWeb;

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

  }
    
}