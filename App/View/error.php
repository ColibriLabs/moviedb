<?php

/**
 * @var string $message
 * @var string $location
 * @var float $memory
 * @var \Colibri\Http\Response $response
 * @var \Colibri\URI\Builder $url
 * @var \Colibri\Parameters\ParametersCollection $config
 */

$this->setSection('title', sprintf('Error %d', $response->getStatusCode()));

?>
<!DOCTYPE html>
<html lang="en">
<?php echo $this->fetch('partials/head'); ?>
<body>

<div class="modal-filter-box">
  
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="text-center jumbotron">
          <h1><b><?= $response->getStatusCode(); ?></b></h1>
          <h2 id="navbar">Error Page</h2>
          <br>
          <a class="btn btn-light btn-sm btn-outline" href="<?= $this->url('home'); ?>">
            <i class="fa fa-home"></i>
            Home Page
          </a>
        </div>
        <?php if ($config->path('application.debug.enabled')): ?>
        <div>
          <h4>Error message</h4>
          <pre><?= $message ?></pre>
          <h4>Location</h4>
          <pre>HIDDEN/<?= basename($location) ?></pre>
          <h4>Memory: <b><?= $memory; ?></b></h4>
        </div>
        <?php endif; ?>
      </div>
    </div>

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
