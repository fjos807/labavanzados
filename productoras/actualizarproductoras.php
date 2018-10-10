<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laboratorio MongoDB</title>
    </head>
    <body>
        <h2>Actualizar Datos</h2>
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


            foreach ( $data as $current ){
                echo "<tr><form action=actualizar.php method=post>";
                echo "<td><input type=text name=nombre value='" . $current['nombre'] . "'readonly></td>";
                echo "<td><input type=text name=year value='" . $current['anofundacion'] . "'></td>";
                echo "<td><input type=text name=sitio value='" . $current['sitioweb'] . "'></td>";
                echo "<td><input type=submit value=Actualizar></td>";
                echo "</form></tr>";
            }
            ?>
        </table>

    </body>
</html>
