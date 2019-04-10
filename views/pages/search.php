<?php include '../views/partials/header.php' ?>

<div class="dispResearch">
<?php if(!empty($plantsList)): ?>
    <?php foreach($plantsList as $key): ?>
        <div class="plantsText">
            <img src="<?= !empty($key['images'][0]) ? $key['images'][0]['url'] : URL.'assets/images/placeholder.png' ?>" alt="plant picture" class="plant_image_home">
            <p class="plant_name"><?= $key['name'] ?></p>
            <a href="<?= 'plant/'.$key['id'] ?>" class="plant_link">
                <img src="<?= URL ?>assets/images/plus.svg" alt="petit plus"> 
                Add
            </a>
        </div>
    <?php endforeach; ?>
<?php elseif(empty($plantsList) && !empty($_GET['name'])): ?>
    <h2><?= ucfirst(strtolower($plant)) ?> not found</h2>
<?php endif ?>
</div>

<?php include '../views/partials/footer.php' ?>