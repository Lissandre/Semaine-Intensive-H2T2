<?php
include "../config/database.php";
// Error and success messages

$messages = [
    'error' => [],
    'success' => [],
];

// Form sent

if(!empty($_POST))
{
    // Get variables
    $login = trim($_POST['login']) ;
    $password = $_POST['password'];

    // Handle errors

    if(empty($login))
        $messages['error'][] = 'Please enter an e-mail address';

    if(empty($password))
        $messages['error'][] = 'Please enter a password';

    // Success
    if(empty($messages['error']))
    {
        $data = [
            'name'=> $login,
            'password' => hash('md5', $password)
        ];

        // Check if username exists
        $temp = 'SELECT login FROM users WHERE login = \''.$data['name'].'\' AND password = \''.$data['password'].'\'';

        $user = $pdo->query($temp)->fetch();
        if($user != FALSE)
        {
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;

            header("Location: ../welcome.php");
            exit;
        }
        else
            $messages['error'][] = 'Incorrect informations';
    }
}



include '../views/pages/login.php';