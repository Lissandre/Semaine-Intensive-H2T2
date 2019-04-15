<?php
$title = 'The Green Thumb - Add Plant';
if(empty($_SESSION['login'])){
    header('Location: signup');
    exit;
}

include 'views/pages/addplant.php';