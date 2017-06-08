<?php

namespace ColibriLabs;

use Colibri\ColibriORM;
use Colibri\Common\Configuration;
use Colibri\Parameters\ParametersCollection;
use Colibri\Http\Response;
use Colibri\ServiceLocator\Service;
use Colibri\Template\Core\ExtensionInterface;
use Colibri\Template\Template;
use Colibri\UrlGenerator\UrlBuilder;
use Colibri\WebApp\Application;
use Colibri\WebApp\ApplicationContainer;
use ColibriLabs\Lib\Util\Profiler;



/**
 * Class MoviesDbApplication
 * @package ProCart\Core
 */
class MoviesDbApplication extends Application\ConfigurableApplication
{
  
  /**
   * MoviesDbApplication constructor.
   */
  public function __construct()
  {
    parent::__construct(new ParametersCollection(include_once __DIR__ . '/../App/Config/Config.php'));
  
    if (file_exists($this->config->path('application.dev-config'))) {
      $this->config->merge(new ParametersCollection(include_once $this->config->path('application.dev-config')));
    }
    
    $this->config->handlePlaceholders();
  }
  
  /**
   * Application initialization
   */
  protected function boot()
  {
    Profiler::timerStart();
    
    $this->session->start();
    $this->configurationErrors()->configurationRoutes();
    $this->initializeColibriORM();
    $this->view->registerExtension(new class implements ExtensionInterface {
      
      public function register(Template $template)
      {
        /** @var UrlBuilder $url */
        $url = ApplicationContainer::instance()->get('url');
        $template->registerFunction('url', [$url, 'path']);
      }
      
    });
  }
  
  /**
   * @return $this
   * @throws \Colibri\Exception\InvalidArgumentException
   */
  public function initializeColibriORM()
  {
    $configuration = Configuration::createFromFile(__DIR__ . '/../App/Config/Orm.php');
    ColibriORM::initialize($configuration);
    $developmentFile = $configuration->path('colibri_orm.dev_configuration');
    file_exists($developmentFile) && $configuration->merge(Configuration::createFromFile($developmentFile));
    $this->getContainer()->set('colibri', ColibriORM::getServiceContainer());
    
    return $this;
  }
  
  /**
   * @return $this
   */
  private function configurationRoutes()
  {
    return $this;
  }
  
  /**
   * @return $this
   */
  private function configurationErrors()
  {
    set_exception_handler(function ($exception) {
      /** @var \Throwable $exception */
      if ($this->config->path('application.debug.exceptions') == 1) {
        $message = get_class($exception) . ": {$exception->getMessage()}";
        
        $trace = $exception->getTraceAsString();
        
        if (null !== $exception->getPrevious()) {
          $trace = sprintf("%s\n-- PREV\n%s", $trace, $exception->getPrevious()->getTraceAsString());
        }
        
        $this->createErrorResponse($message, $exception->getFile(), $exception->getLine(), $trace);
      } else {
        $this->createErrorResponse('Debug mode disabled. Message hidden', 'null', 0, 'none');
      }
    });
    
    register_shutdown_function(function () {
      $lastPhpError = error_get_last();
      if (null !== $lastPhpError) {
        $this->response->setStatusCode(403);
        if ($this->config->path('application.debug.php_errors') == 1) {
          $this->createErrorResponse($this->formatPhpError($lastPhpError),
            $lastPhpError['file'], $lastPhpError['line'], 'none');
        } else {
          $this->createErrorResponse("Debug mode disabled. Message hidden", 'null', 0, 'none');
        }
      }
    });
    
    return $this;
  }
  
  /**
   * @param $message
   * @param $file
   * @param $line
   *
   * @param null $stackTrace
   * @return Response
   */
  private function createErrorResponse($message, $file = null, $line = null, $stackTrace = null)
  {
    ob_clean();
    
    $this->view->batch([
      'message' => $message,
      'memory' => $this->memoryUsage(),
      'location' => "$file:$line",
      'stackTrace' => $stackTrace,
      'file' => basename($file),
      'line' => $line,
    ]);
    
    /** @var Service $service */
    foreach ($this->getContainer() as $service) {
      $this->view->set($service->getName(), $this->getContainer()->get($service->getName()));
    }
    
    $this->response
      ->setContent($this->view->render('error'))
      ->setBodyFormat(Response::RESPONSE_HTML)
      ->send();
    
    die;
  }
  
  /**
   * @param array $lastPhpError
   * @return string
   */
  private function formatPhpError(array $lastPhpError = [])
  {
    $phpVersion = PHP_VERSION;
    
    return "PHP {$phpVersion}\n{$this->friendlyErrorType($lastPhpError['type'])} [{$lastPhpError['message']}]";
  }
  
  /**
   * @param $type
   * @return integer
   */
  private function friendlyErrorType($type)
  {
    $types = [];
    
    $typeNames = [
      E_ERROR => 'E_ERROR',
      E_WARNING => 'E_WARNING',
      E_PARSE => 'E_PARSE',
      E_NOTICE => 'E_NOTICE',
      E_CORE_ERROR => 'E_CORE_ERROR',
      E_CORE_WARNING => 'E_CORE_WARNING',
      E_COMPILE_ERROR => 'E_COMPILE_ERROR',
      E_COMPILE_WARNING => 'E_COMPILE_WARNING',
      E_USER_ERROR => 'E_USER_ERROR',
      E_USER_WARNING => 'E_USER_WARNING',
      E_USER_NOTICE => 'E_USER_NOTICE',
      E_STRICT => 'E_STRICT',
      E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',
      E_DEPRECATED => 'E_DEPRECATED',
      E_USER_DEPRECATED => 'E_USER_DEPRECATED',
    ];
    
    foreach (array_keys($typeNames) as $phpType) {
      if ($type & $phpType) {
        $types[] = $typeNames[$phpType];
      }
    }
    
    return implode(' & ', $types);
  }
  
  /**
   * @return string
   */
  private function memoryUsage()
  {
    return Profiler::memoryUsage();
  }
  
}