<?php require APPROOT . '/views/inc/header.php'; ?>

 
  <h1 class="display-3"><?= $data['title']; ?></h1>
  <p class="lead"><?= $data['description']; ?></p>
  <p>Version: <?= VERSION; ?></p>

<?php require APPROOT . '/views/inc/footer.php'; ?>