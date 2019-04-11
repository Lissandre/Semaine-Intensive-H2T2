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
        <div class="log_and_name">
            <img class="logo_img" src="<?= URL ?>assets/images/logo.svg" alt="logo">
            <p class="name_logo">The Green Thumb</p>
        </div>

        <?php if($_GET['q']!='home' && $_GET['q']!=''): ?>
        <form class="header_search" action="search" method="get">
            <label for="name">
            </label>
            <input class="search_bar_header" type="text" name="name" id="name" autocomplete="off" placeholder="Search your plant" >
        </form>
        <div class="buttons_icons">
            <div class="button">
                <a class="my_plant" href="myplants">My Plant</a>
            </div>
            <div class="button">
                <a class="add_plant" href="search">Add Plant</a>
            </div>
            <a class="button" href="logout">
                <img class="log_out_img" src="<?= URL ?>assets/images/log-out.svg" alt="log out icon">
            </a>
        </div>
        <?php elseif($_GET['q']=='home' || $_GET['q']==''): ?>
        <div class="buttons_icons">
            <div class="button">
                <a class="my_plant" href="login">Login</a>
            </div>
            <div class="button">
                <a class="add_plant" href="signup">Sign Up</a>
            </div>
        </div>
        <?php endif; ?>
    </header>
    <?php endif; ?>