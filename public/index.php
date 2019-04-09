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

if($q == 'home' || $q == 'index')
{
    $controller = 'home';
}else if($q == 'search')
{
    $controller = 'search';
}else if($q == 'plant')
{
    header('Location: search');
}else if (preg_match('/^plant\/[1-9][0-9]*$/', $q))
{
    $controller = 'plant';
}

 //include controller
 include '../controllers/'.$controller.'.php';