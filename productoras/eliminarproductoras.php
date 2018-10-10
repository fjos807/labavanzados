<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laboratorio MongoDB</title>
    </head>
    <body>
        <h2>Eliminar Datos</h2>
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
                echo "<tr><form action=eliminar.php method=post>";
                echo "<td><input type=text name=nombre value='" . $current['nombre'] . "'readonly></td>";
                echo "<td><input type=text name=genero value='" . $current['anofundacion'] . "'></td>";
                echo "<td><input type=text name=nombredirector value='" . $current['sitioweb'] . "'></td>";
                echo "<td><input type=submit value=Eliminar></td>";
                echo "</form></tr>";
            }
            ?>
        </table>

    </body>
</html>
