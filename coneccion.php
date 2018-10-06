<?php
    require 'vendor/autoload.php';
    $client = new MongoDB\Client;



    foreach($client->listDatabases() as $db) {
        var_dump($db);
    }
