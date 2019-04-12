<?php
require_once '../config/api_trefle.php';
$title = 'The Green Thumb - My Plants';



$messages = [
    'error' => [],
    'success' => []
];

//get all user's plants
$temp = $pdo->query('SELECT * FROM plants WHERE id_user = \''.$_SESSION['login'].'\'');
$temp = $temp->fetchAll();


if (isset($_SESSION['login']) && isset($_SESSION['password']))
    include '../views/pages/myplants.php';
else
    $messages['error'][] = 'Oops! Something went wrong. Please try again later.';
