<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
    <div class="row mb-3">
        <form >
            <div class =" search_form">
            <input class="search_input" type="text">
            </div>
        </form>
        <div class="col-md-6">
            <h1 class="display-3"><?= $data['title']; ?></h1>
            <p class="lead"><?= $data['description']; ?></p>
        </div>

    </div>
<?php if ($data['fromApi']): ?>
    <div class="owl-carousel owl-theme">
    <?php foreach ($data['recipes'] as $recipe): ?>
        <div class="api_recipe item">
            <a href="">
                <form class="delete-post-form d-inline" action="<?= URLROOT; ?>/recipes/add" method="POST">
                    <button name="recipe_id" class="btn <?= $recipe['btn_class']; ?>" data-toggle="tooltip"
                            data-placement="top"
                            value="<?= $recipe['id']; ?>" title="Like"><i class="fas fa-star"></i></button>
                    <input type="hidden" name="recipe_title" value="<?= $recipe['title']; ?>">
                    <input type="hidden" name="recipe_img" value="<?= $recipe['image']; ?>">
                </form>
                <p class="lead"><?= $recipe['title']; ?></p>
                <img src="<?= $recipe['image']; ?>" alt="">
                <div class="gradient"></div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="owl-carousel owl-theme">
        <?php foreach ($data['recipes'] as $recipe): ?>
                <div class="db_recipe item ">
                    <p class="lead"><?= $recipe['recipe_title']; ?></p>
                    <img src="<?= $recipe['recipe_img']; ?>" alt="">
                    <div class="gradient"></div>
                </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>