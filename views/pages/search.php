<?php include '../views/partials/header.php' ?>

<div class="dispResearch">
<?php if(!empty($plantsList)): ?>
    <?php foreach($plantsList as $key): ?>
        <div class="plantsText">
            <img src="<?= !empty($key[3][0]) ? $key[3][0]->url : "placeholer" ?>" alt="plant picture" class="plant_image_home">
            <p>Name : <?= $key[0] ?></p>
            <a href="<?= 'plant/'.$key[2] ?>">Add</a>
        </div>
    <?php endforeach; ?>
<?php elseif(empty($plantsList) && !empty($_GET['name'])): ?>
    <h2><?= ucfirst(strtolower($plant)) ?> not found</h2>
<?php endif ?>
</div>

<?php include '../views/partials/footer.php' ?>