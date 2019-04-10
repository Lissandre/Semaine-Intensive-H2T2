<?php
$title = 'The Green Thumb - My Plants';

session_start();

$messages = [
    'error' => [],
    'success' => []
];

if (isset($_SESSION['login']) && isset($_SESSION['password']))
    include '../views/pages/myplants.php';
else
    $messages['error'][] = 'Oops! Something went wrong. Please try again later.';
