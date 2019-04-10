<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
    <link rel="stylesheet" href="<?= URL ?>assets/style_loginpage.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
</head>
<body>
    <?php if($_GET['q']!='login' && $_GET['q']!='connect'): ?>
    <header>
        <img class="logo_img" src="<?= URL ?>assets/images/logo.svg" alt="logo">
        <p class="name_logo">The Green Thumb</p>

        <form class="header_search" action="<?= URL ?>search" method="get">
            <label for="name">
                <img src="<?= URL ?>assets/images/search.svg" alt="ptitloup">
            </label>
            <input type="text" name="name" id="name" autocomplete="off" value="Search">
        </form>

            <div class=" button first_button">
                <a href="<?= URL ?>myplants" class="my_plants">My plants</a>
            </div>

            <div class=" second_button">
                <a href="<?= URL ?>addplant" class="add_plant">Add plant</a>
            </div>
            
            <a href="#">
                <img class="log_out_img" src="<?= URL ?>assets/images/log-out.svg" alt="log out icon">
            </a>
    </header>
    <?php endif; ?>