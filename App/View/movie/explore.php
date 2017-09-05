<?php

/**
 * @var \Colibri\Router\Router $router
 * @var \Colibri\Pagination\Paginator $pagination
 * @var \ColibriLabs\Database\Om\Movie[] $movies
*/

$movies = $pagination->getRepository()->findAll()->getCollection();

?>
<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <h2 id="navbar">Explore Movies</h2>
    </div>

    <div>
      <div class="row equal">
        <?php foreach ($movies as $movie): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 ">

          <div class="row movie-item">
            <div class="col-lg-12 movie-item-poster">
              <?php if($movie->getPosterPicture()): ?>
                <img class="img-responsive" src="<?php echo $movie->getPosterPicture(); ?>" alt="<?php echo $movie->getTitle(); ?>">
              <?php else: ?>
                <img class="img-responsive" src="https://dummyimage.com/230x320/243235/fff.png&text=<?php echo $movie->getTitle(); ?>">
              <?php endif; ?>
            </div>
            <div class="col-lg-12">
              <h4>
                <a href="<?php echo $url->create('movie:item', [
                  'slug' => $movie->getTitleSlug(), 'id' => $movie->getId()
                ]); ?>"><?php echo $movie->getTitle(); ?></a>
              </h4>
              <?php if (null !== ($tagline = $movie->getTagline())): ?>
                <div class="movie-tagline"><?php echo $movie->getTagline(); ?></div>
              <?php endif; ?>
            </div>
          </div>
          
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <?php echo $this->fetch('partials/pagination', [
      'urlPath' => $router->getTargetUri(),
      'pagination' => $pagination,
    ]); ?>

  </div>
</div>