<?php

        $nombre = $_POST['nombre'];
        $year = $_POST['year'];
        $sitio = $_POST['sitio'];


        require '../vendor/autoload.php';


        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->productoras;

        $actualizar = $coleccion->updateOne(['nombre' => $nombre], ['$set' => ['anofundacion' => $year, 'sitioweb' => $sitio]]);
        printf("%d documentos coinciden \n", $actualizar->getMatchedCount());
        printf("Modificados %d documentos \n", $actualizar->getModifiedCount());

