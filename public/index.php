<?php
include '../config/database.php';

/**
 * Routing
 */

define ('URL','http://localhost:8888/Semaine-Intensive-H2T2/public/');
//Get q param
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';
//define controller
$controller = '404';
if($q == 'home' || $q == 'index'){
    $controller = 'home';
}else if($q == 'search'){
    $controller = 'search';
}else if($q == 'addplant' || $q == 'add_plant'){
    $controller = 'addplant';
}else if($q == 'myplants' || $q == 'my_plants'){
    $controller = 'myplants';
}else if($q == 'connect' || $q == 'login'){
    $controller = 'login';
}else if($q == 'signup'){
    $controller = 'signup';
}else if($q == 'plant'){
    header('Location: search');
}else if (preg_match('/^plant\/[1-9][0-9]*$/', $q)){
    $controller = 'plant';
}

 //include controller
 include '../controllers/'.$controller.'.php';