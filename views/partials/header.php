<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="icon" href="<?= URL ?>assets/images/logo.png">
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
</head>
<body>
    <?php if($_GET['q']!='login' && $_GET['q']!='connect' && $_GET['q']!='signup'): ?>
    <header>
        <a class="log_and_name" href="<?= URL ?>myplants">
            <img class="logo_img" src="<?= URL ?>assets/images/logo.svg" alt="logo">
            <p class="name_logo">The Green Thumb</p>
        </a>

        <?php if($_GET['q']!='home' && $_GET['q']!=''): ?>
            <?php if((empty($plantsList) && !empty($_GET['name']))||!empty($_GET['name'])): ?>
                <form class="header_search" action="<?= URL ?>search" method="get">
                    <input class="search_bar_header" type="text" name="name" id="name" autocomplete="off" placeholder="Search your plant" >
                </form>
            <?php endif; ?>
        <div class="buttons_icons">
            <div class="button">
                <a class="my_plant" href="<?= URL ?>myplants">My Plant</a>
            </div>
            <div class="button">
                <a class="add_plant" href="<?= URL ?>search">Add Plant</a>
            </div>
            <a class="button" href="<?= URL ?>logout">
                <img class="log_out_img" src="<?= URL ?>assets/images/log-out.svg" alt="log out icon">
            </a>
        </div>
        <?php elseif($_GET['q']=='home' || $_GET['q']==''): ?>
        <div class="buttons_icons">
            <div class="button">
                <a class="my_plant" href="<?= URL ?>login">Login</a>
            </div>
            <div class="button">
                <a class="add_plant" href="<?= URL ?>signup">Sign Up</a>
            </div>
        </div>
        <?php endif; ?>
    </header>
    <?php endif; ?>