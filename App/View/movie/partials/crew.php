<?php

/**
 * @var array $crew
 * @var \Colibri\UrlGenerator\UrlBuilder $url
 */

?>
<?php if(isset($crews) && $crews instanceof \Colibri\Collection\CollectionInterface): ?>
  <h2>Characters</h2>
  <div class="people-list">
    <?php foreach($crews as $crew): ?>
      <div class="photos-inline equal">
        <div class="panel panel-default">
          <div class="panel-heading"><i><?php echo $crew['name']; ?></i></div>
          <div class="panel-body">
            <a href="<?php echo $url->create('person', ['id' => $crew['profileID'],]); ?>">
              <?php if((integer)$crew['pictureExist'] == 1): ?>
                <img alt="<?php echo $crew['name']; ?>" class="img-responsive" src="<?php echo $crew['picturePath']; ?>" data-src="<?php echo $crew['picturePath']; ?>">
              <?php else: ?>
                <img class="img-responsive" src="<?php echo $url->staticPath('images/noprofile.png'); ?>">
              <?php endif; ?>
            </a>
          </div>
          <div class="panel-footer"><b><?php echo $crew['department']; ?></b></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>