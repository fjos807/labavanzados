<?php

        $nombre = $_POST['nombre'];

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $eliminar = $coleccion->deleteOne(['nombre' => $nombre]);
        printf("Eliminados %d documentos \n", $eliminar->getDeletedCount());


