<?php
$title = 'The Green Thumb - Add Plant';
if(empty($login)){
    header('Location: signup');
    exit;
}

include 'views/pages/addplant.php';