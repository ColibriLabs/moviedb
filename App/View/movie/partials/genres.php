<?php

/**
 * @var \ColibriLabs\Database\Om\Genre[]|\Colibri\Collection\ArrayCollection $genres
 * @var \Colibri\UrlGenerator\UrlBuilder $url
 */

?>
<div class="movie-genres">
  <?php if (isset($genres) && count($genres) > 0): ?>
    <?php foreach ($genres as $genre): ?>
      <?php $link = $url->create('discover:parameters_apply', null, ['parameters' => ['genre' => [$genre->getId()]]]); ?>
      <a href="<?php echo $link; ?>" class="label label-danger"><?php echo $genre->getName(); ?></a>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
