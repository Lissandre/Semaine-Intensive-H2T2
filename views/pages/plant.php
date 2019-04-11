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
            <form action="#" method="post">
            <?php for ($i=1; $i < sizeof($favorites); $i++): ?>
                <p class="favoriteInfo">
                    <?= $favorites[$i] ?>
                    <button type="submit" name="<?= $i ?>" value="<?= $favorites[$i] ?>">Delete</button>
                </p>
            <?php endfor; ?>
            </form>
        </div>
        <div class="informations">
            <form action="#" method="post">
                <label class="name">
                    Name : <?= $result['name'] ? $result['name'] : 'Not found' ?>
                </label>
                <input value="name" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="scientificName">
                    Scientific name : <?= $result['scientific_name'] ? $result['scientific_name'] : 'Not found' ?>
                </label>
                <input value="scientific_name" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="shapeOrientation">
                    Shape & orientation : <?= $result['shape_and_orientation'] ? $result['shape_and_orientation'] : 'Not found' ?>
                </label>
                <input value="shape_and_orientation" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="matureHeight">
                    Mature height : <?= $result['mature_height'] ? $result['mature_height'] : 'Not found' ?>
                </label>
                <input value="mature_height" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="lifespan">
                    Lifespan : <?= $result['lifespan'] ? $result['lifespan'] : 'Not found' ?>
                </label>
                <input value="lifespan" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="growthPeriod">
                    Growth period : <?= $result['growth_period'] ? $result['growth_period'] : 'Not found' ?>
                </label>
                <input value="growth_period" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="growthHabit">
                    Growth habit : <?= $result['growth_habit'] ? $result['growth_habit'] : 'Not found' ?>
                </label>
                <input value="growth_habit" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="tempMini">
                    Temperature minimum : <?= $result['temperature_minimum'] ? $result['temperature_minimum'].'°C' : 'Not found' ?>
                </label>
                <input value="temperature_minimum" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="precMini">
                    Precipitation minimum : <?= $result['precipitation_minimum'] ? $result['precipitation_minimum'].'cm' : 'Not found' ?>
                </label>
                <input value="precipitation_minimum" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="precMax">
                    Precipitation maximum : <?= $result['precipitation_maximum'] ? $result['precipitation_maximum'].'cm' : 'Not found' ?>
                </label>
                <input value="precipitation_maximum" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="flowerColor">
                    Flower color : <?= $result['flower_color'] ? $result['flower_color'] : 'Not found' ?>
                </label>
                <input value="flower_color" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <label class="duration">
                    Duration : <?= $result['duration'] ? $result['duration'] : 'Not found' ?>
                </label>
                <input value="duration" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                <input type="submit" name ="add" value="Add">
            </form>
        </div>
    </div>
    <script src="<?= URL ?>assets/checkbox.js"></script>
<?php endif; ?>

<?php include '../views/partials/footer.php' ?>