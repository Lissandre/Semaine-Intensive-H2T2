<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= URL ?>assets/images/logo.png"/>
</head>
<body>
    <?php if($_GET['q']!='login' && $_GET['q']!='connect'): ?>
    <header>
        <div class="log_and_name">
            <img class="logo_img" src="<?= URL ?>assets/images/logo.svg" alt="logo">
            <p class="name_logo">The Green Thumb</p>
        </div>
        

        <div class="buttons_icons">
            <p class="button">
                <a class="my_plant" href="<?= URL ?>connect">Login</a>
            </p>

            <p class="button">
                <a class="add_plant" href="<?= URL ?>signup">Sign Up</a>
            </p>
            
            <a href="<?= URL ?>logout">

            <a class="button" href="<?= URL ?>home">

                <img class="log_out_img" src="<?= URL ?>assets/images/log-out.svg" alt="log out icon">
            </a>
        </div>
    </header>
    <?php endif; ?>