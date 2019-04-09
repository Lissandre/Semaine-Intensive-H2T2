<?php include '../views/partials/header.php' ?>

<h1>Home</h1>
<form action="#" method="get">
    <label for="name">Name of your plant</label>
    <input type="text" name="name" id="name" autocomplete="off">
    <input type="submit" value="Search">
</form>
<div class="dispResearch">
<?php if(!empty($plantsList)): ?>
    <?php foreach($plantsList as $key): ?>
        <div data-url="<?= $key[2] ?>" class="plantsText">
            <p>Common name : <?= $key[0] ?></p>
            <p>Scientific name : <?= $key[1] ?></p>
        </div>
    <?php endforeach; ?>
<?php endif ?>
</div>

<?php include '../views/partials/footer.php' ?>