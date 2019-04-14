<?php
$title = 'The Green Thumb - Sign Up';

$messages = [
    'mail-error' => [],
    'pwd-error' => [],
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
        $messages['mail-error'][] = 'Your email is missing';
    }

    elseif (strlen($password) < 5)
    {
        $messages['pwd-error'][] = 'Your password is too short';
    }

    // Check if username already exists
    $temp = 'SELECT login FROM users WHERE login ="'.$login.'"';

    $user = $pdo->query($temp)->fetch();
    if ($user->login === $login)
    {
        $messages['mail-error'][] = 'This mail already have an account';
    }
// Success
    if (empty($messages['mail-error']) && empty($messages['pwd-error']))
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

include 'views/pages/signup.php';