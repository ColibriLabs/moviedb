<?php

namespace ColibriLabs\Controller;

use Colibri\Core\Entity\RepositoryInterface;
use Colibri\Html\Element\SelectElement;
use Colibri\Http\Response;
use Colibri\Pagination\Paginator;
use Colibri\Query\Statement\OrderBy;
use ColibriLabs\Database\Om\Movie;
use ColibriLabs\Database\Om\MovieRepository;
use ColibriLabs\Lib\ControllerWeb;

use ColibriLabs\Lib\Util\BaseConverter;
use ColibriLabs\Lib\Util\BigIntPack;
use ColibriLabs\Lib\Util\Locale;
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
  
  /**
   * @param null|string $hash
   */
  public function indexAction($hash = null)
  {
    $converter = BaseConverter::instance();

    return var_export(BigIntPack::unpack($converter->decode($hash)), true);
  }
    
}