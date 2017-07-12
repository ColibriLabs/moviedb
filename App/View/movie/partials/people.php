<?php

/**
 * @var \ColibriLabs\Database\Om\Picture[]|\Colibri\Collection\ArrayCollection $pictures
 * @var \Colibri\UrlGenerator\UrlBuilder $url
 * @var \ColibriLabs\Database\Om\Character $character
 */

?>
<?php if(isset($characters) && $characters instanceof \Colibri\Collection\ArrayCollection): ?>
  <h2>Characters</h2>
  <div class="people-list">
    <?php foreach($characters as $character): ?>
      <div class="photos-inline equal">
        <div class="panel panel-default">
          <div class="panel-heading"><i><?php echo $character->getProfile()->getName(); ?></i></div>
          <div class="panel-body">
            <a href="<?php echo $url->create('person', ['id' => $character->getProfile()->getId(),]); ?>">
              <?php $pictures = $character->getProfile()->getPictures(); if($pictures->has(0)): ?>
                <img class="img-responsive" src="<?php echo $pictures->get(0)->getPicturePath(); ?>">
              <?php else: ?>
                <img class="img-responsive" src="<?php echo $url->staticPath('images/noprofile.png'); ?>">
              <?php endif; ?>
            </a>
          </div>
          <div class="panel-footer"><b><?php echo $character->getCharacter(); ?></b></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>