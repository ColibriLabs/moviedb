<?php

/**
 * @var \Colibri\Template\Core\Compiler $this
 * @var \ColibriLabs\Database\Om\Movie $movie
 * @var \Colibri\URI\Builder $url
 */

use ColibriLabs\Database\Om\CharacterRepository;
use ColibriLabs\Database\Om\Genre;

$genres = $movie->getGenres()->values(Genre::NAME_KEY);

$charactersRepository = new CharacterRepository();
$characters = $charactersRepository->loadCharactersForMovie($movie);

$this->setSection('title', $movie->getTitle());

?>
<style>
  .movie-backdrop {
    background-image: url(<?php echo $movie->getBackdrop()->getPicturePath(); ?>),
    url(<?php echo $url->staticPath('images/gradient2.jpg'); ?>);
  }
</style>

<div class="container-fluid ">
  <div class="movie-backdrop row">
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
        <img alt="<?php echo $movie->getTitle(); ?>" class="hidden-xs img-responsive movie-poster" src="<?php echo $movie->getPoster()->getPicturePath(); ?>">
        <?php echo $this->fetch('movie/partials/genres', ['genres' => $movie->getGenres(),]); ?>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <?php echo $this->fetch('movie/partials/people', ['characters' => $characters]); ?>
    </div>
  </div>

</div>
