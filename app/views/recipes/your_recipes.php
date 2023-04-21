<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1 class="display-3"><?= $data['title']; ?></h1>
        <p class="lead"><?= $data['description']; ?></p>
    </div>
    <!--    <div class="col-md-6">-->
    <!--        <h1 class="display-3">Twoje Zestawy</h1>-->
    <!--        <p class="lead">konfiguruj, kasuj, używaj </p>-->
    <!--    </div>-->

</div>
<div class="grid_div">
    <?php foreach ($data['recipes'] as $recipe): ?>
        <div>
            <a href="<?= URLROOT; ?>/recipes/show/<?= $recipe['recipe_id']; ?>">

                <img src="<?= $recipe['recipe_img']; ?>" alt="">
                <h4 class="lead"><?= $recipe['recipe_title']; ?></h4>
                </a>
                <!--            <div class="mb-5 gradient"></div>-->

        </div>

    <?php endforeach; ?>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
