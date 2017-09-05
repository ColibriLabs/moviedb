<?php

/**
 * @var \Colibri\Template\Core\Compiler $this
 * @var \ColibriLabs\Database\Om\Movie  $movie
 * @var \Colibri\URI\Builder            $url
 * @var \ColibriLabs\Lib\Web\Metatag    $metatag
 */

use ColibriLabs\Database\Om\CharacterRepository;
use ColibriLabs\Database\Om\CrewRepository;
use ColibriLabs\Database\Om\Genre;

$characters = (new CharacterRepository())->loadCharactersForMovie($movie);
$crews = (new CrewRepository())->loadCrewForMovie($movie);

$metatag->setOgTitle($movie->getTitle());
$metatag->setOgDescription($movie->getOverview());
$metatag->setOgImage($movie->getPosterPicture());
$metatag->setOgImage($movie->getBackdropPicture());

$metatag->setTwitterCard('photo');
$metatag->setTwitterTitle($movie->getTitle());
$metatag->setTwitterDescription($movie->getOverview());
$metatag->setTwitterImage($movie->getPosterPicture());
$metatag->setTwitterImage($movie->getBackdropPicture());

$this->setSection('title',
  sprintf('%s (%d)', $movie->getTitle(), (new \DateTime($movie->getReleaseDate()))->format('Y')));
$this->setSection('description', $movie->getOverview());

?>
<style>
  .movie-backdrop {
    background-image: url(<?php echo $movie->getBackdropPicture(); ?>),
    url(<?php echo $url->staticPath('images/gradient2.jpg'); ?>);
  }
</style>

<div class="container-fluid ">
  <div class="movie-backdrop row" data-src="<?php echo $movie->getBackdropPicture(); ?>">
    <div class="movie-overlay"></div>
  </div>
</div>

<div class="container movie-container">

  <div class="row">
    <div class="movie-main">

      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 movie-left-side col-md-push-3 col-sm-push-4">
        <div>
          <h2><?php echo $movie->getTitle(); ?></h2>
          <?php if (null !== ($tagline = $movie->getTagline())): ?>
            <i><h4><?php echo $movie->getTagline(); ?></h4></i>
          <?php endif; ?>
          <div>
            <?php echo $movie->getOverview(); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
            <h5>Release Date</h5>
            <h6><?php echo (new DateTime($movie->getReleaseDate()))->format('d M, Y'); ?></h6>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
            <h5>Duration</h5>
            <h6><?php echo $movie->getRuntime(); ?> min</h6>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
            <h5>Budget</h5>
            <h6><?php echo $movie->getBudget(); ?>$</h6>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
            <h5>Revenue</h5>
            <h6><?php echo $movie->getRevenue(); ?>$</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 movie-right-side col-md-pull-9 col-sm-pull-8">
        <img alt="<?php echo $movie->getTitle(); ?>" class="hidden-xs img-responsive movie-poster"
             src="<?php echo $movie->getPosterPicture(); ?>" data-src="<?php echo $movie->getBackdropPicture(); ?>">
        <!--        --><?php //echo $this->fetch('movie/partials/genres', ['genres' => $movie->getGenres(),]); ?>
      </div>

      <div class="col-lg-12">
        <div class="bs-component">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#actors" data-toggle="tab" aria-expanded="true">Actors</a></li>
            <li><a href="#crew" data-toggle="tab" aria-expanded="true">Crew</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="actors">
              <?php echo $this->fetch('movie/partials/people', ['characters' => $characters]); ?>
            </div>
            <div class="tab-pane fade" id="crew">
<!--              --><?php //echo $this->fetch('movie/partials/crew', ['crews' => $crews]); ?>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

</div>
