<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
</head>
<body>
    <header>
        <img class="logo_img" src="<?= URL ?>assets/images/logo.svg" alt="logo">
        <p class="name_logo">The green thumb</p>

        <form class="header_search" action="<?= URL ?>search" method="get">
            <label for="name">Name of your plant</label>
            <input type="text" name="name" id="name" autocomplete="off">
            <input type="submit" value="Search">
        </form>

        <div>
            <a href="/myplants" class="my_plants">My plants</a>
            <a href="//addplant" class="add_plant">Add plant</a>
            <a href="#">
                <img class="log_out_img" src="<?= URL ?>assets/images/log-out.svg" alt="log out icon">
            </a>
        </div>
    </header>