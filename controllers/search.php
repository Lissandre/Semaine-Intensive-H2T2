<?php 
require('config/api_trefle.php');
$title = 'The Green Thumb - Search';
if(empty($_SESSION['login'])){
    header('Location: signup');
    exit;
}

 /**
 * API trefle.io (to search a plant by it's name)
 * >> REST API
 */

/**
 * Get plants
 */

if(!empty($_GET['name']))
{
    $plant=strtolower($_GET['name']);
    // Create URL
    $url = 'https://trefle.io/api/plants';
    $url .= '?'.http_build_query([
        'q' => $plant,
        'token' => TOKEN_TREFLE,
        'page_size' => '30',
    ]);

    // Cache info
    $cacheKey = md5($url);
    $cachePath = 'cache/'.$cacheKey;
    //If Request has been done before and younger than a week
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 604800)
    {
        $plantsList = file_get_contents($cachePath);
        $plantsList = json_decode($plantsList, true);
    }else{
        // Make request to API
        $result = file_get_contents($url);

        // Decode JSON
        $result = json_decode($result);
        //Set an array to get all the returns plants
        $plantsList = [];
        //Scan the result to get the values needed from JSON object
        foreach ($result as $key) {
            //Push these values to the array if there is a common name (so the plant can be known from more than just a biologist)
            if($key->common_name){
                array_push($plantsList, 
                [
                'name' => $key->common_name,
                'scientific_name' => $key->scientific_name,
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

            //JSON decode
            $images = json_decode($images, true);
            //Save images in array
            array_push($arrayImages, $images['images']);
        }
        //Merging plants and images arrays
        for ($i=0; $i < sizeof($plantsList); $i++) { 
            $plantsList[$i]['images'] = $arrayImages[$i];
        }
        // Save request API in cache if something found
        if(!empty($plantsList)){
            $searchSave = json_encode($plantsList);
            file_put_contents($cachePath, $searchSave);
        }
    };
};

include 'views/pages/search.php';