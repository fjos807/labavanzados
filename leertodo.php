<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laboratorio MongoDB</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h2>Laboratorio MongoDB</h2>

        <table>
            <tr>
                <th>Nombre</th>
                <th>G&eacutenero</th>
                <th>Nombre Director</th>
                <th>Franquicia</th>
                <th>Pa&iacutes</th>
                <th>Fecha estreno</th>
                <th>Duraci&oacuten</th>
                <th>Productora</th>
                <th>Actores</th>
            </tr>
        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->find();


        foreach ( $data as $current )
            echo "<tr><td>". $current['nombre'] . "</td><td>". $current['genero'] . "</td><td>". $current['nombredirector'] . "</td><td>". $current['franquicia'] . "</td><td>". $current['pais'] . "</td><td>". $current['anoestreno'] . "</td><td>". $current['duracion'] . "</td><td>". $current['productora'] . "</td><td>". $current['actores']. "</td></tr>";
        ?>
        </table>
    </body>
</html>

