<?php

$title = 'My Website';


/**
 * Exemple of POST method
 */

if(!empty($_POST))
{
    // enter the data from your POST here
    $data = [
        // for a text :
        'data1' => trim($_POST['input1']),
        // for a time (care your form!)
        'data2' => strtotime($_POST['input2']),
        // for a int
        'data3' => (int)$_POST['input3'],
    ];

    // to include in your database
    $prepare = $pdo->prepare('
        INSERT INTO
            tab1 (column1, column2, column3)
        VALUES
            (:data1, :data2, :data3)
    ');
    $prepare->execute($data);
    // you can add more execute here
}

// to query some data
$query = $pdo->query('SELECT * FROM tab1');
$returnedData = $query->fetchAll();


include '../views/pages/home.php';