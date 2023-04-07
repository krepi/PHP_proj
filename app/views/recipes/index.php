<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message' ); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1 class="display-3"><?= $data['title']; ?></h1>
        <p class="lead"><?= $data['description']; ?></p>
    </div>

</div>
<?php if (!empty($data['recipes']) ): ?>
    <?php foreach ($data['recipes'] as $recipe): ?>
        <form class="delete-post-form d-inline" action="<?= URLROOT; ?>/recipes/add" method="POST">
            <button name="recipe_id" class="btn <?= $recipe['btn_class']; ?>" data-toggle="tooltip" data-placement="top"
                    value="<?= $recipe['id']; ?>" title="Like"><i class="fas fa-star"></i></button>
        </form>

        <p  class="lead"><?= $recipe['title']; ?></p>
        <img  src="<?= $recipe['image']; ?>" alt="">
        <div class="mb-5"></div>

    <?php endforeach; ?>
<?php else: ?>
    <h2>Prawdopodbnie limit zapytań do API  sie wyczerpał</h2>
    <p>Wiec pracuje na dummy danych</p>
    <form class="delete-post-form d-inline" action="<?= URLROOT; ?>/recipes/add" method="POST">
        <button name="recipe_id" class="btn <?= $data['btn_class']; ?>" data-toggle="tooltip" data-placement="top"
                value="133432" title="Like"><i class="fas fa-star"></i></button>
    </form>
<?php endif; ?>



<?php require APPROOT . '/views/inc/footer.php'; ?>