<?php
require('../config/api_trefle.php');
$title = 'home';

 /**
 * API trefle.io (to search a plant by it's name)
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
    // Cache info
    $cacheKey = md5($url);
    $cachePath = '../cache/'.$cacheKey;
    $cacheUsed = false;
    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 60)
    {
        $result = file_get_contents($cachePath);
        $cacheUsed = true;
    }
    // Cache not available
    else
    {
        // Make request to API
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($curl);
        curl_close($curl);
        // Save API in cache
        file_put_contents($cachePath, $result);
    }

    // Decode JSON
    $result = json_decode($result);

    //Set an array to get all the returns plants
    $plantsList = [];
    //Scan the result to get the values needed from JSON object
    foreach ($result as $key) {
        //Push these values to the array
        array_push($plantsList, [$key->common_name, $key->scientific_name, $key->link]);
    }

    /**
     * Get Images
     */

    $arrayImages = [];
    //Create URL
    foreach ($plantsList as $key) {
        $url = $key[2].'?token='.TOKEN_TREFLE;

        //Request to API
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $images = curl_exec($curl);
        curl_close($curl);
        
        $images = json_decode($images);
        array_push($arrayImages, $images->images);
    }

    for ($i=0; $i < sizeof($plantsList); $i++) { 
        array_push($plantsList[$i], $arrayImages[$i]);
    }
};

include '../views/pages/home.php';