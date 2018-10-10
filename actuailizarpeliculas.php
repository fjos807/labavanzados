<?php

        $nombre = $_POST['nombre'];
        $genero = $_POST['genero'];
        $nomdirector = $_POST['nombredirector'];
        $franquicia = $_POST['franquicia'];
        $pais = $_POST['pais'];
        $year = $_POST['anoestreno'];
        $duracion = $_POST['duracion'];
        $productora = $_POST['productora'];
        $actores = $_POST['actores'];

        require 'vendor/autoload.php';


        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $actualizar = $coleccion->updateOne(['nombre' => $nombre], ['$set' => ['genero' => $genero, 'nombredirector' => $nomdirector, 'franquicia' => $franquicia, 'pais' => $pais, 'anoestreno' => $year, 'duracion' => $duracion, 'productora' => $productora, 'actores' => $actores]]);
        printf("%d documentos coinciden \n", $actualizar->getMatchedCount());
        printf("Modificados %d documentos \n", $actualizar->getModifiedCount());

