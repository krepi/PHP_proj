<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?= $data['title'] ?> </h1>
    <div class="row  mt-5 mb-3">
        <div class="col-md-6">
            <img src="<?= $data['image']; ?>" alt="">
            <?php foreach ($data['extendedIngredients'] as $ingredient): ?>


                    <p class="lead"><?= $ingredient['original']; ?></p>

            <?php endforeach; ?>
        </div>
        <div class="col-md-6">
            <p><?= $data['summary'] ?> </p>
            <p><?= $data['instructions'] ?> </p>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>