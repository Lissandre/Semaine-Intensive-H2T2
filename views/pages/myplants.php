<?php include '../views/partials/header.php' ?>

<h1>My Plants</h1>
<?php foreach ($result as $key): ?>
    <div class="image"><img src="<?= $key['images'][0]['url'] ?>" alt=""></div>
<?php endforeach ?>

<?php include '../views/partials/footer.php' ?>