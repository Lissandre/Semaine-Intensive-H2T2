<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
    <link rel="stylesheet" href="<?= URL ?>assets/style_loginpage.css">
</head>
<body>
    <header>
        <form action="<?= URL ?>search" method="get">
            <label for="name">Name of your plant</label>
            <input type="text" name="name" id="name" autocomplete="off">
            <input type="submit" value="Search">
        </form>
        <ul>
            <li>
                <a href="<?= URL ?>">Home</a>
            </li>
        </ul>
    </header>