<?php
include '../config/database.php';

session_start();
/**
 * Routing
 */

define ('URL','http://localhost:8888/public/');
//Get q param
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';
//define controller
$controller = '404';
if (isset($_SESSION["loggedin"])) {
    if($q == 'home' || $q == 'index'){
        header('Location: search');
    }else if($q == 'search'){
        $controller = 'search';
    }else if($q == 'addplant' || $q == 'add_plant'){
        $controller = 'addplant';
    }else if($q == 'myplants' || $q == 'my_plants'){
        $controller = 'myplants';
    }else if($q == 'connect' || $q == 'login'){
        header('Location: search');
    }else if($q == 'signup'){
        header('Location: search');
    }else if($q == 'logout'){
        $controller = 'logout';
    }else if($q == 'plant'){
        header('Location: search');
    }else if (preg_match('/^plant\/[1-9][0-9]*$/', $q)){
        $controller = 'plant';
    }
}else if(!isset($_SESSION["loggedin"])){
    if($q == 'home' || $q == 'index'){
        $controller = 'home';
    }else if($q == 'search'){
        header('Location: signup');
    }else if($q == 'addplant' || $q == 'add_plant'){
        header('Location: signup');
    }else if($q == 'myplants' || $q == 'my_plants'){
        header('Location: signup');
    }else if($q == 'connect' || $q == 'login'){
        $controller = 'login';
    }else if($q == 'signup'){
        $controller = 'signup';
    }else if($q == 'logout'){
        $controller = 'logout';
    }else if($q == 'plant'){
        header('Location: signup');
    }else if (preg_match('/^plant\/[1-9][0-9]*$/', $q)){
        header('Location: signup');;
    }
}

 //include controller
 include '../controllers/'.$controller.'.php';