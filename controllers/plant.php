<?php 
require('../config/api_trefle.php');
$title = 'plant datas';

 /**
 * API trefle.io (to search a plant by it's name)
 * >> REST API
 */
 //Get q param
 $q = !empty($_GET['q']) ? $_GET['q'] : 'home';

include '../views/pages/plant.php';