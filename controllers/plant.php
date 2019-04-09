<?php 
require('../config/api_trefle.php');
$title = 'plant datas';

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
}else
{
    $result = 'NOT FOUND'; 
}
echo '<pre>';
print_r($result);
echo '</pre>';

include '../views/pages/plant.php';
