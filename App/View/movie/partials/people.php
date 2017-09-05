<?php

/**
 * @var array $character
 * @var \Colibri\UrlGenerator\UrlBuilder $url
 */

?>
<?php if(isset($characters) && $characters instanceof \Colibri\Collection\CollectionInterface): ?>
  <h2>Characters</h2>
  <div class="people-list">
    <?php foreach($characters as $character): ?>
      <div class="photos-inline equal">
        <div class="panel panel-default">
          <div class="panel-heading"><i><?php echo $character['name']; ?></i></div>
          <div class="panel-body">
            <a href="<?php echo $url->create('person', ['id' => $character['profileID'],]); ?>">
              <?php if((integer)$character['pictureExist'] == 1): ?>
                <img alt="<?php echo $character['name']; ?>" class="img-responsive" src="<?php echo $character['picturePath']; ?>" data-src="<?php echo $character['picturePath']; ?>">
              <?php else: ?>
                <img class="img-responsive" src="<?php echo $url->staticPath('images/noprofile.png'); ?>">
              <?php endif; ?>
            </a>
          </div>
          <div class="panel-footer"><b><?php echo $character['character']; ?></b></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>