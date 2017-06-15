<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>QiWi.tv</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="<?php echo $url->staticPath('css/site.min.css'); ?>" media="screen">
</head>
<body>

<div class="modal-filter-box">
  <?php echo $this->fetch('partials/navbar', ['navbar' => 'default']); ?>
  <?php echo $content; ?>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo $url->staticPath('js/bootstrap.min.js'); ?>"></script>
</body>
</html>
