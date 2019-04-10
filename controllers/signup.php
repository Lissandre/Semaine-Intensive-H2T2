<?php
$title = 'The Green Thumb - Sign Up';

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

    if (empty($login))
    {
        $messages['error'][] = 'missing login';
    }

    elseif (strlen($password) < 5)
    {
        $messages['error'][] = 'password too short';
    }

    // Check if username already exists
    $temp = 'SELECT login FROM users WHERE login ="'.$login.'"';

    $user = $pdo->query($temp)->fetch();
    if ($user->login === $login)
    {
        $messages['error'][] = 'This mail already have an account';
    }
// Success
    if (empty($messages['error']))
    {
        $data = [
            'login'=> $login,
            'password'=> hash('md5', $password)
        ];
        $prepare = $pdo->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');

        $prepare->execute($data);

        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;

        $messages['success'][] = 'Welcome to The Green Thumb !';
        header("Location: myplants");

        $_POST['name'] = '';
        $_POST['password'] = '';
    }
}

// Form not sent
else
{
    $_POST['login'] = '';
    $_POST['password'] = '';
}

include '../views/pages/signup.php';