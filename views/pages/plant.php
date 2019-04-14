<?php include 'views/partials/header.php' ?>

<?php if($result==='NOT FOUND'): ?>
    <div class="notfound">
        <h2>PLANT NOT FOUND</h2>
    </div>
<?php else: ?>
    <div class="content_infos">

        
        <div class="photo_and_title">
            <h2 class="title_plan_add"> <?= $result['name'] ? $result['name'] : 'Not found' ?> </h2>
            <div class="img_plant_info" style="background-image:url(<?= !empty($result['images'][0]) ? $result['images'][0]['url'] : URL.'public/assets/images/placeholder.png' ?>)"></div>
        </div>

        <div class="all_info">

            <div class="favorites">
                <p class="favoris_infos_title">Favoris infos</p>
                
                <form action="#" method="post">
                <?php for ($i=0; $i < sizeof($favorites); $i++): ?>
                <?php if($favorites[$i]!=''): ?>
                    <p class="favoriteInfo">
                        <?= $favorites[$i] ?>
                        <button type="submit" name="<?= $i ?>" value="<?= $favorites[$i] ?>">
                            <img src="<?= URL ?>public/assets/images/x-circle.svg" alt="buttondelete">
                        </button>
                    </p>
                <?php endif; ?>
                <?php endfor; ?>
                </form>
            </div>

            <div class="informations">

                <p class="all_infos_title">All infos</p>
                <form action="#" method="post">

                    <div class="label_input_inline">
                        <input value="name" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="name">
                            Name : <?= $result['name'] ? $result['name'] : 'Not found' ?>
                        </label>
                    </div>
                    
                    <div class="label_input_inline">
                        <input value="scientific_name" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="scientificName">
                            Scientific name : <?= $result['scientific_name'] ? $result['scientific_name'] : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="shape_and_orientation" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="shapeOrientation">
                            Shape & orientation : <?= $result['shape_and_orientation'] ? $result['shape_and_orientation'] : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="mature_height" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="matureHeight">
                            Mature height : <?= $result['mature_height'] ? $result['mature_height'] : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="lifespan" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="lifespan">
                            Lifespan : <?= $result['lifespan'] ? $result['lifespan'] : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="growth_period" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="growthPeriod">
                            Growth period : <?= $result['growth_period'] ? $result['growth_period'] : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="growth_habit" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="growthHabit">
                            Growth habit : <?= $result['growth_habit'] ? $result['growth_habit'] : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="temperature_minimum" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="tempMini">
                            Temperature minimum : <?= $result['temperature_minimum'] ? $result['temperature_minimum'].'°C' : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="precipitation_minimum" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="precMini">
                            Precipitation minimum : <?= $result['precipitation_minimum'] ? $result['precipitation_minimum'].'cm' : 'Not found' ?>
                        </label>
                    </div>
                    
                    <div class="label_input_inline">
                        <input value="precipitation_maximum" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="precMax">
                            Precipitation maximum : <?= $result['precipitation_maximum'] ? $result['precipitation_maximum'].'cm' : 'Not found' ?>
                        </label>
                    </div>

                    <div class="label_input_inline">
                        <input value="flower_color" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="flowerColor">
                            Flower color : <?= $result['flower_color'] ? $result['flower_color'] : 'Not found' ?>
                        </label>
                    </div>
                    
                    <div class="label_input_inline">
                        <input value="duration" type="checkbox" name ="PHP_favBox[]" class="JS_limitChoice">
                        <label class="duration">
                            Duration : <?= $result['duration'] ? $result['duration'] : 'Not found' ?>
                        </label>
                    </div>

                    <input class="label_input_inline" type="submit" name ="add" value="Add">

                </form>
            </div>

        </div>
        

    </div>

    <script src="<?= URL ?>public/assets/checkbox.js"></script>
<?php endif; ?>

<?php include 'views/partials/footer.php' ?>