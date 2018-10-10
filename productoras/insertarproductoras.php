<?php

    if (isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $year = $_POST['year'];
        $sitio = $_POST['sitio'];

        require '../vendor/autoload.php';


        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->productoras;

        $insert = $coleccion->insertOne(['nombre' => $nombre, 'anofundacion'=> (int)$year, 'sitioweb' => $sitio]);

        printf("Insertados %d documentos \n", $insert->getInsertedCount());

    }
