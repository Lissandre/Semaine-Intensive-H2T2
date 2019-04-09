<?php 
require('../config/api_trefle.php');
$title = 'The Green Thumb - Search';

 /**
 * API trefle.io (to search a plant by it's name)
 * >> REST API
 */

/**
 * Get plants
 */

if(!empty($_GET['name']))
{
    $plant=$_GET['name'];
    // Create URL
    $url = 'https://trefle.io/api/plants';
    $url .= '?'.http_build_query([
        'q' => $plant,
        'token' => TOKEN_TREFLE,
    ]);

    // Make request to API
    $result = file_get_contents($url);
    // Decode JSON
    $result = json_decode($result);
    //Set an array to get all the returns plants
    $plantsList = [];
    //Scan the result to get the values needed from JSON object
    foreach ($result as $key) {
        //Push these values to the array if there is a common name
        if($key->common_name){
            array_push($plantsList, 
            [
            'name' => $key->common_name,
            'link' => $key->link,
            'id' => $key->id
            ]);
        } 
    }

    /**
     * Get Images
     */

    $arrayImages = [];
    
    //Create URL for every plants to get their images
    foreach ($plantsList as $key) {
        $url = $key['link'].'?token='.TOKEN_TREFLE;

        //Request to API
        $images = file_get_contents($url);
        $images = json_decode($images);
        
        //Save images in array
        array_push($arrayImages, $images->images);
    }
    //Merging plants and images arrays
    for ($i=0; $i < sizeof($plantsList); $i++) { 
        $plantsList[$i]['images'] = $arrayImages[$i];
    }
};

include '../views/pages/search.php';