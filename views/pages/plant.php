<?php include '../views/partials/header.php' ?>

<?php if($result==='NOT FOUND'): ?>
    <div class="notfound">
        <h2>PLANT NOT FOUND</h2>
    </div>
<?php else: ?>
    <div class="content">
        <div class="photo">
            <img src="<?= !empty($result['images'][0]) ? $result['images'][0]['url'] : URL.'assets/images/placeholder.jpg' ?>" alt="Plant's photo">
        </div>
        <div class="favorites">
            <?php foreach ($favorites as $key): ?>
                <p class="favoriteInfo">
                    <?= $key ?>
                    <button>Remove</button>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="informations">
            <p class="name">
                Name : <?= $result['name'] ? $result['name'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('name') ?>" type="<?= in_array($result['name'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="scientificName">
                Scientific name : <?= $result['scientific_name'] ? $result['scientific_name'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('scientific_name') ?>" type="<?= in_array($result['scientific_name'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="shapeOrientation">
                Shape & orientation : <?= $result['shape_and_orientation'] ? $result['shape_and_orientation'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('shape_and_orientation') ?>" type="<?= in_array($result['shape_and_orientation'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="matureHeight">
                Mature height : <?= $result['mature_height'] ? $result['mature_height'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('mature_height') ?>" type="<?= in_array($result['mature_height'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="lifespan">
                Lifespan : <?= $result['lifespan'] ? $result['lifespan'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('lifespan') ?>" type="<?= in_array($result['lifespan'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="growthPeriod">
                Growth period : <?= $result['growth_period'] ? $result['growth_period'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('growth_period') ?>" type="<?= in_array($result['growth_period'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="growthHabit">
                Growth habit : <?= $result['growth_habit'] ? $result['growth_habit'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('growth_habit') ?>" type="<?= in_array($result['growth_habit'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="tempMini">
                Temperature minimum : <?= $result['temperature_minimum'] ? $result['temperature_minimum'].'°C' : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('temperature_minimum') ?>" type="<?= in_array($result['temperature_minimum'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="precMini">
                Precipitation minimum : <?= $result['precipitation_minimum'] ? $result['precipitation_minimum'].'cm' : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('precipitation_minimum') ?>" type="<?= in_array($result['precipitation_minimum'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="precMax">
                Precipitation maximum : <?= $result['precipitation_maximum'] ? $result['precipitation_maximum'].'cm' : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('precipitation_maximum') ?>" type="<?= in_array($result['precipitation_maximum'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="flowerColor">
                Flower color : <?= $result['flower_color'] ? $result['flower_color'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('flower_color') ?>" type="<?= in_array($result['flower_color'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
            <p class="duration">
                Duration : <?= $result['duration'] ? $result['duration'] : 'Not found' ?>
            </p>
            <button onclick="<?= addToFav('duration') ?>" type="<?= in_array($result['duration'], $favorites) ? 'disabled' : 'submit' ?>">Add to Favorites</button>
        </div>
    </div>
<?php endif; ?>

<?php include '../views/partials/footer.php' ?>