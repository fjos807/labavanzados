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
        <h3>Resultados de la busqueda</h3>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Fecha estreno</th>
            </tr>
        <?php

        $productora = $_POST['productoras'];

        require '../vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->find(
            ['productora' => $productora]
        );


        foreach ( $data as $current )
            echo "<tr><td>". $current['nombre'] . "</td><td>". $current['genero'] . "</td><td>". $current['anoestreno'] . "</td></tr>";
        ?>
        </table>
    </body>
</html>
