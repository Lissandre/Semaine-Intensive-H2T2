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
    $result = [
        'name' => $resultAPI->common_name,
        'scientific_name' => $resultAPI->scientific_name,
        'shape_and_orientation' => $resultAPI->main_species->specifications->shape_and_orientation,
        'mature_height' => $resultAPI->main_species->specifications->mature_height->cm,
        'lifespan' => $resultAPI->main_species->specifications->lifespan,
        'growth_period' => $resultAPI->main_species->specifications->growth_period,
        'growth_habit' => $resultAPI->main_species->specifications->growth_habit,
        'images' => $resultAPI->images,
        'temperature_minimum' => $resultAPI->main_species->growth->temperature_minimum->deg_c,
        'precipitation_minimum' => $resultAPI->main_species->growth->precipitation_minimum->cm,
        'precipitation_maximum' => $resultAPI->main_species->growth->precipitation_maximum->cm,
        'flower_color' => $resultAPI->main_species->flower->color,
        'duration' => $resultAPI->duration
    ];
}else
{
    $result = 'NOT FOUND'; 
}
echo '<pre>';
print_r($result);
echo '</pre>';

include '../views/pages/plant.php';
