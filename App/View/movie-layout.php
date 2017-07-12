<!DOCTYPE html>
<html lang="en">
<html lang="en">
<?php echo $this->fetch('partials/head'); ?>
<body>

<div class="modal-filter-box">
  <?php echo $this->fetch('partials/navbar', ['navbar' => 'default']); ?>
  <?php echo $content; ?>
</div>

<?php echo $this->fetch('partials/debug'); ?>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo $url->staticPath('js/bootstrap.min.js'); ?>"></script>
</body>
</html>
