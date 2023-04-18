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
    <?php foreach ($data['recipes'] as  $recipe): ?>
        <form class="delete-post-form d-inline" action="<?= URLROOT; ?>/recipes/add" method="POST">
            <button name="recipe_id" class="btn btn-warning" data-toggle="tooltip" data-placement="top"
                    value="<?= $recipe['recipe_id']; ?>" title="Like"><i class="fas fa-star"></i></button>
            <input type="hidden" name="recipe_title" value="<?= $recipe['recipe_title']; ?>">
            <input type="hidden" name="recipe_img" value="<?= $recipe['recipe_img']; ?>">
        </form>
            <p  class="lead"><?= $recipe['recipe_title']; ?></p>
            <img  src="<?= $recipe['recipe_img']; ?>" alt="">
            <div class="mb-5"></div>
    <?php endforeach; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>
