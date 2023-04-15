<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message' ); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1 class="display-3"><?= $data['title']; ?></h1>
        <p class="lead"><?= $data['description']; ?></p>
    </div>
    <div class="col-md-6">
        <h1 class="display-3">Twoje Zestawy</h1>
        <p class="lead">konfiguruj, kasuj, używaj </p>
    </div>

</div>
<?php //if (!empty($data['recipes']) ): ?>
    <?php foreach ($data['recipes'] as  $recipe): ?>
            <p  class="lead"><?= $recipe['recipe_title']; ?></p>
            <img  src="<?= $recipe['recipe_img']; ?>" alt="">
            <div class="mb-5"></div>


    <?php endforeach; ?>
<?php //else: ?>

<?php //endif; ?>



<?php require APPROOT . '/views/inc/footer.php'; ?>
