<!DOCTYPE html>
<html lang="en">
<?php echo $this->fetch('partials/head'); ?>
<body>

<div class="modal-filter-box">
  <?php echo $this->fetch('partials/navbar'); ?>
  <div class="container">
    <?php echo $content; ?>
  </div>
</div>

<?php echo $this->fetch('partials/debug'); ?>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo $url->staticPath('js/bootstrap.min.js'); ?>"></script>
</body>
</html>
