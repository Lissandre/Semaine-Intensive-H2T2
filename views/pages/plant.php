<?php include '../views/partials/header.php' ?>

<?php if($result==='NOT FOUND'): ?>
    <div class="notfound">
        <h2>PLANT NOT FOUND</h2>
    </div>
<?php else: ?>
    <div class="content">
        <div class="photos">
            <?php if($result['images']): ?>
                <?php foreach ($result['images'] as $key): ?>
                    <img src="<?= $key['url'] ?>" alt="Plant image">
                <?php endforeach; ?>
            <?php else: ?>
                <img src="placeholder" alt="Photo not found">
            <?php endif; ?>
        </div>
        <div class="informations">
            <p class="name">Name : <?= $result['name'] ? $result['name'] : 'Not found' ?></p>
            <p class="scientificName">Scientific name : <?= $result['scientific_name'] ? $result['scientific_name'] : 'Not found' ?></p>
            <p class="shapeOrientation">Shape & orientation : <?= $result['shape_and_orientation'] ? $result['shape_and_orientation'] : 'Not found' ?></p>
            <p class="matureHeight">Mature height : <?= $result['mature_height'] ? $result['mature_height'] : 'Not found' ?></p>
            <p class="lifespan">Lifespan : <?= $result['lifespan'] ? $result['lifespan'] : 'Not found' ?></p>
            <p class="growthPeriod">Growth period : <?= $result['growth_period'] ? $result['growth_period'] : 'Not found' ?></p>
            <p class="growthHabit">Growth habit : <?= $result['growth_habit'] ? $result['growth_habit'] : 'Not found' ?></p>
            <p class="tempMini">Temperature minimum : <?= $result['temperature_minimum'] ? $result['temperature_minimum'] : 'Not found' ?></p>
            <p class="precMini">Precipitation minimum : <?= $result['precipitation_minimum'] ? $result['precipitation_minimum'] : 'Not found' ?></p>
            <p class="precMax">Precipitation maximum : <?= $result['precipitation_maximum'] ? $result['precipitation_maximum'] : 'Not found' ?></p>
            <p class="flowerColor">Flower color : <?= $result['flower_color'] ? $result['flower_color'] : 'Not found' ?></p>
            <p class="duration">Duration : <?= $result['duration'] ? $result['duration'] : 'Not found' ?></p>
        </div>
    </div>
<?php endif; ?>

<?php include '../views/partials/footer.php' ?>