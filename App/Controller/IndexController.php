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
    $this->response->setBodyFormat(Response::RESPONSE_API_JSON);
    
    return ['movie' => new Movie()];
  }
  
  public function tmdbParserAction()
  {
    return exec(sprintf('ls -la %s/movies | wc -l', $this->config->path('tmdb_root')));
  }
  
  public function tmdbApiAction()
  {
    $this->response->setBodyFormat(Response::RESPONSE_JSON);
    
    $token = new ApiToken($this->config->path('tmdb_api.token'));
    $client = new Client($token);
    
//    $configRepository = new ConfigurationRepository($client);
//    $helper = new ImageHelper($configRepository->load());
    
//    $repository = new TmdbMovieRepository($client);
//    /** @var \Tmdb\Model\Movie $movie */
//    $movie = $repository->load(155);
    
//    var_dump($client->getCreditsApi()->getCredit('52fe4220c3a36847f8005d17'));
    
    var_dump(
//      $client->getCollectionsApi()->getCollection(263),
//      $client->getPeopleApi()->getPerson(1579),
      $client->getMoviesApi()->getMovie(155)
//      $client->getCreditsApi()->getCredit('52fe4220c3a36847f8005cf9')
    ); die;
      
    return $client->getSearchApi()->searchMovies('Bee Movie');
  }
    
}