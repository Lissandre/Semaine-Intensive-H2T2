<?php
require_once 'config/api_trefle.php';
$title = 'The Green Thumb - My Plants';
if(empty($_SESSION['login'])){
    header('Location: signup');
    exit;
}



$messages = [
    'error' => [],
    'success' => []
];

//get all user's plants
$temp = $pdo->query('SELECT * FROM plants WHERE mailuser = \''.$_SESSION['login'].'\'');
$temp = $temp->fetchAll();


if (isset($_SESSION['login']) && isset($_SESSION['password']))
    include 'views/pages/myplants.php';
else
    $messages['error'][] = 'Oops! Something went wrong. Please try again later.';
