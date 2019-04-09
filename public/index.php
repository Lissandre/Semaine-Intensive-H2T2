<?php

include '../config/database.php';

/**
 * Routing
 */

define ('URL','http://localhost:8888/public/');

//Get q param
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';

//define controller
$controller = '404';

if($q == 'home')
{
    $controller = 'home';
}else if($q == 'plant')
{
    header('Location: home');
}else if (preg_match('/^plant\/[1-9][0-9]*$/', $q))
{
    $controller = 'plant';
}

/**
 * prepare your POST here
 */






 //include controller
 include '../controllers/'.$controller.'.php';