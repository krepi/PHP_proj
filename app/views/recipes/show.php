<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?= $data['title'] ?> </h1>
    <div class="row  mt-5 mb-3">
        <div class="col-md-6">

<!--            <img src="--><?php //= $data['image']; ?><!--" alt="">-->
            <?php if (isset($data['image'])): ?>
                <img src="<?= $data['image']  ; ?>" alt="<?= $data['title']; ?>">
            <?php else: ?>
                <img src="https://source.unsplash.com/x5SRhkFajrA" alt="">
            <?php endif; ?>

            <?php foreach ($data['extendedIngredients'] as $ingredient): ?>
                    <p class="lead"><?= $ingredient['original']; ?></p>
            <?php endforeach; ?>
        </div>
        <div class="col-md-6">
            <p><?= htmlspecialchars($data['summary'], ENT_QUOTES) ?> </p>
            <p><?= htmlspecialchars($data['instructions'], ENT_QUOTES) ?> </p>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>