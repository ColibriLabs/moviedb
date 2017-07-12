<?php

/**
 * @var \ColibriLabs\Database\Om\Movie[]|\Colibri\Core\Collection\EntityCollection $movies
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
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
          <div class="well">
            <?php if(null  !== $movie->getPoster()): ?>
              <img class="img-responsive" src="<?php echo $movie->getPoster()->getPicturePath(); ?>" alt="">
            <?php endif; ?>
            <div>
              <h4>
                <a href="<?php echo $url->create('movie:item', [
                  'slug' => $movie->getTitleSlug(), 'id' => $movie->getId()
                ]); ?>"><?php echo $movie->getTitle(); ?></a>
              </h4>
              <h6><?php
                echo implode(', ', $movie->getGenres()->values('name')->toArray())
                ?></h6>
            </div>
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