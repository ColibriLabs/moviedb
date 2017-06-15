<?php

/**
 * @var \ColibriLabs\Database\Om\Movie[]|\Colibri\Core\Collection\EntityCollection $movies
 * @var \Colibri\Collection\ArrayCollection $posters
*/

?>
<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <h2 id="navbar">Explore Movies</h2>
    </div>

    <div>
      <div class="row equal">
        <?php foreach ($movies as $movie): ?>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
          <img class="img-responsive img-thumbnail" src="//image.tmdb.org/t/p/original<?php echo $posters[$movie->getId()]; ?>" alt="">
          <div>
            <h5>
              <a href="<?php echo $url->create('movie:index', [
                'id' => $movie->getId()
              ]); ?>"><?php echo $movie->getTitle(); ?></a>
            </h5>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php echo \ColibriLabs\Lib\Util\Profiler::memoryUsage(); ?>
    <br>
    <?php echo \ColibriLabs\Lib\Util\Profiler::timeSpend(); ?>

  </div>
</div>