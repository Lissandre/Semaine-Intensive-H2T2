<?php
$title = 'The Green Thumb - Login';

// Error and success messages

$messages = [
    'mail-error' => [],
    'pwd-error' => [],
];

if (!empty($_POST))
{
    // Get variables
    $login = trim($_POST['login']) ;
    $password = $_POST['password'];

    // Handle errors

    if (empty($login))
    {
        $messages['mail-error'][] = 'Please enter an e-mail address';
    }

    if (empty($password))
    {
        $messages['pwd-error'][] = 'Please enter a password';
    }

    // Success
    if (empty($messages['mail-error']) && empty($messages['pwd-error']))
    {
        $data = [
            'name'=> $login,
            'password' => hash('md5', $password)
        ];

        // Check if username exists
        $temp = 'SELECT login FROM users WHERE login = \''.$data['name'].'\' AND password = \''.$data['password'].'\'';

        $user = $pdo->query($temp)->fetch();
        if ($user != FALSE)
        {
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;

            header("Location: myplants");
            exit;
        }
        else
        {
            $messages['pwd-error'][] = 'Incorrect informations';
        }
    }
}

include '../views/pages/login.php';