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
        <a href="<?= URL.'plant/'.$key[3] ?>" class="plantsText">
                <img src="<?= $key[4][0] ? $key[4][0]->url : "placeholer" ?>" alt="">
            <p>Common name : <?= $key[0] ?></p>
            <p>Scientific name : <?= $key[1] ?></p>
        </a>
    <?php endforeach; ?>
<?php elseif(empty($plantsList) && !empty($_GET['name'])): ?>
    <h2><?= ucfirst(strtolower($plant)) ?> not found</h2>
<?php endif ?>
</div>

<?php include '../views/partials/footer.php' ?>