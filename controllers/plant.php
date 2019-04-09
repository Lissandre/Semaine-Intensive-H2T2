<?php 
require('../config/api_trefle.php');
$title = 'The Green Thumb - Datas';

 /**
 * API trefle.io (to search a plant by it's name)
 * >> REST API
 */
 //Get q param
$id = basename($_GET['q']);
// Create URL
$url = 'https://trefle.io/api/plants/'.$id.'?token='.TOKEN_TREFLE;
// Make request to API if the id exist
if(get_headers($url)[0]=='HTTP/1.1 200 OK')
{
    $result = file_get_contents($url);
    // Decode JSON
    $result = json_decode($result);
    //Saving important informations in an array
    $result = [
        'name' => $result->common_name,
        'scientific_name' => $result->scientific_name,
        'shape_and_orientation' => $result->main_species->specifications->shape_and_orientation,
        'mature_height' => $result->main_species->specifications->mature_height->cm,
        'lifespan' => $result->main_species->specifications->lifespan,
        'growth_period' => $result->main_species->specifications->growth_period,
        'growth_habit' => $result->main_species->specifications->growth_habit,
        'images' => $result->images,
        'temperature_minimum' => $result->main_species->growth->temperature_minimum->deg_c,
        'precipitation_minimum' => $result->main_species->growth->precipitation_minimum->cm,
        'precipitation_maximum' => $result->main_species->growth->precipitation_maximum->cm,
        'flower_color' => $result->main_species->flower->color,
        'duration' => $result->duration
    ];
}else
{
    //If the plant is not found
    $result = 'NOT FOUND'; 
}

include '../views/pages/plant.php';
