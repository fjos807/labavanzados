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


            foreach ( $data as $current ){
                echo "<tr><form action=/labmongo/actuailizarpeliculas.php method=post>";
                echo "<td><input type=text name=nombre value='" . $current['nombre'] . "'readonly></td>";
                echo "<td><input type=text name=genero value='" . $current['genero'] . "'></td>";
                echo "<td><input type=text name=nombredirector value='" . $current['nombredirector'] . "'></td>";
                echo "<td><input type=text name=franquicia value='" . $current['franquicia'] . "'></td>";
                echo "<td><input type=text name=pais value='" . $current['pais'] . "'></td>";
                echo "<td><input type=text name=anoestreno value='" . $current['anoestreno'] . "'></td>";
                echo "<td><input type=text name=duracion value='" . $current['duracion'] . "'></td>";
                echo "<td><input type=text name=productora value='" . $current['productora'] . "'></td>";
                echo "<td><input type=text name=actores value='" . $current['actores'] . "'></td>";
                echo "<td><input type=submit value=Actualizar></td>";
                echo "</form></tr>";
            }
            ?>
        </table>

    </body>
</html>
