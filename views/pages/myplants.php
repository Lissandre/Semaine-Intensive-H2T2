<?php include 'views/partials/header.php' ?>

<div class="dispResearchbis">
    <?php if(!empty($plants)): ?>
        <?php foreach($plants as $key): ?>
            <div class="plantsTextbis">
                <div style="background-image:url(<?= !empty($key->images[0]) ? $key->images[0]['url'] : URL.'assets/images/placeholder.png' ?>);" alt="plant picture" class="plant_image_homebis"></div>
                <p class="plant_name_bis"><?= $key->nameplant ?></p>
                <p class="plant_info_myplants"><?= $key->plantinfoa ?></p>
                <p class="plant_info_myplants"><?= $key->plantinfob ?></p>
                <p class="plant_info_myplants"><?= $key->plantinfoc ?></p>
                <a href="<?= URL.'plant/'.$key->idplant.'?'.$key->id ?>" class="info_link">More info</a>
                <form action="<?= URL.'delete/'.$key->id ?>" method="post">
                    <button type="submit" class="delete_button">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php elseif(empty($plants)): ?>
        <h2 class="not_found">You didn't save any plant yet</h2>
    <?php endif; ?>
</div>

<?php include 'views/partials/footer.php' ?>