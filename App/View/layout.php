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

<?php echo $this->fetch('partials/footer'); ?>

</body>
</html>
