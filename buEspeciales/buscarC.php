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
                <th>Genero</th>
                <th>Nombre Director</th>
                <th>Franquicia</th>
                <th>Pais</th>
                <th>Fecha estreno</th>
                <th>Duracion</th>
                <th>Productora</th>
                <th>Actores</th>
            </tr>
        <?php

            $inicio = $_POST['aNos'];
            $fin = $_POST['aNosfin'];

            echo "<h3>Resultados de la busqueda entre ". $inicio ." y " . $fin . "</h3>";

        require '../vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $rango = array('anoestreno' => array ('$lt' => (int)$fin, '$gt' => (int)$inicio));
        $data = $coleccion->find($rango);

        foreach ( $data as $current )
            echo "<tr><td>". $current['nombre'] . "</td><td>". $current['genero'] . "</td><td>". $current['nombredirector'] . "</td><td>". $current['franquicia'] . "</td><td>". $current['pais'] . "</td><td>". $current['anoestreno'] . "</td><td>". $current['duracion'] . "</td><td>". $current['productora'] . "</td><td>". $current['actores']. "</td></tr>";
        ?>
        </table>
    </body>
</html>
