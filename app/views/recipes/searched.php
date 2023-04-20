<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>searched</h1>

<div class="grid_div">
    <?php foreach ($data['recipes'] as $recipe): ?>
        <div>
            <img src="<?= $recipe['image']; ?>" alt="">
            <h4 class="lead"><?= $recipe['title']; ?></h4>
        </div>
    <?php endforeach; ?>
</div>
