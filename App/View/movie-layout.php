<!DOCTYPE html>
<html lang="en">
<html lang="en">
<?php echo $this->fetch('partials/head'); ?>
<body>

<div class="modal-filter-box">
  <?php echo $this->fetch('partials/navbar', ['navbar' => 'default']); ?>
  <?php echo $content; ?>
</div>

<?php echo $this->fetch('partials/footer'); ?>

</body>
</html>
