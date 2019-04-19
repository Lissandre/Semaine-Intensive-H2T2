<?php
$title = 'The Green Thumb - Delete';

if(empty($_SESSION['login'])){
    header('Location: signup');
    exit;
}else{
    $login = $_SESSION['login'];
}

//Get q param
$id = basename($_GET['q']);

$temp = $pdo->query('SELECT mailuser FROM plants WHERE id = '.$id);
$temp = $temp->fetch();

if($temp->mailuser == $login){
    $data = [
        'id' => $id,
    ];
    $prepare = $pdo->prepare('DELETE FROM plants WHERE (id = :id)');
    $execute = $prepare->execute($data);
}

header('Location: '.URL.'myplants');
exit;