<?php
    require 'vendor/autoload.php';


    $client = new MongoDB\Client;

    $base = $client ->labmongo;
    $coleccion = $base->peliculas

    $insert = $coleccion->insertOne(['nombre' => , 'nombredirector' => ,
                                    'franquicia' => , 'pais' => , 'anoestreno'=> , 'duracion' => , 'productora' => , 'actores'=>]);
