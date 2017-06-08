<?php

/**
 * @var string                 $message
 * @var string                 $location
 * @var float                  $memory
 * @var \Colibri\Http\Response $response
 * @var \Colibri\URI\Builder   $url
 */

use ColibriLabs\Lib\Util\Profiler;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Error Page <?= $response->getStatusCode() ?> / QiwiTV</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="<?php echo $url->staticPath('css/site.min.css'); ?>" media="screen">
</head>
<body>

<div class="modal-filter-box">
  
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="../" class="navbar-brand">QiWi</a>
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      
      <div class="navbar-collapse collapse" id="navbar-main">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo $url->path('/'); ?>" target="_blank">Go To Homepage</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 id="navbar">
            Error Page <b><?= $response->getStatusCode(); ?></b>
          </h2>
        </div>
  
        <div>
          <h4>Error message</h4>
          <pre><?= $message ?></pre>
          <h4>Location</h4>
          <pre>HIDDEN/<?= basename($location) ?></pre>
          <h4>Memory: <b><?= $memory; ?></b></h4>
        </div>
      
      </div>
    </div>
    
    <footer>
  
      <div class="btn-group">
        <a class="btn btn-info" href="<?= $this->url('index/index', [], ['_message' => $message]); ?>">Home Page</a>
        <a class="btn btn-warning" href="<?php echo sprintf('phpstorm://open?file=%s&line=%d;', $file, $line); ?>">Open in PhpStorm</a>
      </div>
    
    </footer>
  
  </div>

</div>

<div id="source-modal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Source Code</h4>
      </div>
      <div class="modal-body">
        <pre></pre>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo $url->staticPath('js/bootstrap.min.js'); ?>"></script>
</body>
</html>
