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

  <?php echo $this->fetch('partials/navbar'); ?>

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
        <a class="btn btn-primary" href="<?= $this->url('home'); ?>">
          <i class="fa fa-home"></i>
          Home Page
        </a>
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
