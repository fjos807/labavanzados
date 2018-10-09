<?php

    if (isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $genero = $_POST['genero'];
        $nomdirector = $_POST['nombredirector'];
        $franquicia = $_POST['franquicia'];
        $pais = $_POST['pais'];
        $year = $_POST['year'];
        $duracion = $_POST['duracion'];
        $productora = $_POST['productora'];
        $actores = $_POST['actores'];

        require 'vendor/autoload.php';


        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $insert = $coleccion->insertOne(['nombre' => $nombre, 'genero' => $genero, 'nombredirector' => $nomdirector, 'franquicia' => $franquicia, 'pais' => $pais, 'anoestreno'=> (int)$year, 'duracion' => (int)$duracion, 'productora' => $productora, 'actores'=> $actores]);

    }
