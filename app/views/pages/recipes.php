<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud">
    <div class="container">
        <h1 class="display-3"><?= $data['title']; ?></h1>
        <p class="lead"><?= $data['description']; ?></p>
        <ul>
            <li>Twoje Zestawy</li>
            <li>Twoje Ulubione Przepisy</li>
        </ul>

    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
