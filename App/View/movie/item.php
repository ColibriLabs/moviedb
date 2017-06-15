<?php

/**
 * @var \ColibriLabs\Database\Om\Movie $movie
 */

?>
<style>
  .movie-backdrop {
    background-image:
      linear-gradient(
        rgba(0, 0, 0, .6),
        rgba(0, 0, 0, .8),
        rgba(0, 0, 0, .9)
      ),
      url(<?php echo $movie->getBackdrop()->getTmdbPicturePath(); ?>),
      linear-gradient(
        135deg,
        rgb(0, 128, 102),
        rgb(0, 70, 130)
      );
  }
</style>
<div class="container-fluid ">

  <div class="movie-backdrop row">

    <div class="container movie-container">

      <div class="row">
        <div class="movie-poster">
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
            <img class="img-responsive" src="<?php echo $movie->getPoster()->getTmdbPicturePath(); ?>">
          </div>
          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <h5 style="color: #fff; font-weight: 400">Animation&nbsp;&bull;&nbsp;Crime&nbsp;&bull;&nbsp;Fantasy</h5>
            <h2 style="color: #fff; font-weight: 400"><?php echo $movie->getTitle(); ?></h2>
          </div>
          <div style="color: #fff; font-weight: 400; text-align: justify;" class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <?php echo $movie->getOverview(); ?>
          </div>
        </div>
      </div>



    </div>

  </div>

</div>

<div class="container movie-container">

  <!--  <div class="movie-poster row">
    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-5">
      <img class="img-responsive" src="<?php /*echo $poster->getTmdbPicturePath(); */ ?>">
    </div>
    <div class="col-lg-9 col-md-9 col-sm-10 col-xs-7">
      <h5 style="color: #fff; font-weight: 400">Animation&nbsp;&bull;&nbsp;Crime&nbsp;&bull;&nbsp;Fantasy</h5>
      <h2 style="color: #fff; font-weight: 400"><?php /*echo $movie->getTitle(); */ ?></h2>
    </div>
  </div>-->

  <!--  <section>-->
  <!--    <h2 class="page-header">Payment Icons</h2>-->
  <!--  </section>-->
</div>