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
                <th>A&ntildeo fundaci&oacuten</th>
                <th>Sitio Web</th>
            </tr>
        <?php

        require '../vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->productoras;

        $data = $coleccion->find();


        foreach ( $data as $current )
            echo "<tr><td>". $current['nombre'] . "</td><td>". $current['anofundacion'] . "</td><td>". $current['sitioweb']. "</td></tr>";
        ?>
        </table>
    </body>
</html>
