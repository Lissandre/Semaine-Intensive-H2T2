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
if (!isset($_SESSION['login']) || !isset($_SESSION['password']))
    $messages['error'][] = 'Oops! Something went wrong. Please try again later.';

//get all user's plants
$plants = $pdo->query('SELECT * FROM plants WHERE mailuser = \''.$_SESSION['login'].'\'');
$plants = $plants->fetchAll();

$arrayImages = [];
        
//Create URL for every plants to get their images
foreach ($plants as $key) {
    $url = 'https://trefle.io/api/plants/'.$key->idplant.'?token='.TOKEN_TREFLE;
    
    //Request to API
    $images = file_get_contents($url);

    //JSON decode
    $images = json_decode($images, true);
    //Save images in array
    array_push($arrayImages, $images['images']);
}
//Merging plants and images arrays
for ($i=0; $i < sizeof($plants); $i++) { 
    $plants[$i]->images = $arrayImages[$i];
}

include 'views/pages/myplants.php';