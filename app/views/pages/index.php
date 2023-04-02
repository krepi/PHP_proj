<?php require APPROOT . '/views/inc/header.php';
print_r($data['recipes']['results'][1]);

?>
<div class="jumbotron jumbotron-flud">
  <div class="container">
  <h1 class="display-3"><?= $data['title']; ?></h1>
  <p class="lead"><?= $data['description']; ?></p>
      <?php foreach ($data['recipes']['results'] as $recipe):  ?>
    <p class="lead"><?= $recipe['title']; ?></p>
          <img src="<?= $recipe['image']; ?>" alt="">
          <br>
    <?php endforeach;  ?>
  </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>