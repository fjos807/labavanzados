<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laboratorio MongoDB</title>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            var usedNames = {};
            $("select[name='productoras'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
        </script>
    </head>
    <body>
        <h2>Consultas especiales</h2>

    <!------------------------- a -------------------------------------------------->
        <p>Consulta por t&iacutetulo de la pel&iacutecula</p>
        <form action="/labmongo/buEspeciales/buscarA.php" method="post">
            <select name="peliculas">
        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->find();

        foreach ( $data as $current )
            echo "<option name=opcion value='" . $current['nombre'] . "'>" . $current['nombre']. "</option>";
        ?>
            </select>
            <input type="submit" value="Buscar">
        </form>
        <br>
    <!------------------------- b -------------------------------------------------->
        <p>Consulta por franquicia</p>

        <form action="/labmongo/buEspeciales/buscarB.php" method="post">
            <select name="franquicias">
        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->find();

        foreach ( $data as $current )
            echo "<option value='" . $current['franquicia'] . "'>" . $current['franquicia']. "</option>";
        ?>
            </select>
            <input type="submit" value="Buscar">
        </form>
        <br>

    <!------------------------- c -------------------------------------------------->

        <p>Consulta por rango de fechas</p>

        <form action="/labmongo/buEspeciales/buscarC.php" method="post">
            <a>De</a>
            <select name="aNos">
        <?php

        for ($i = 1888; $i <= 2019; $i++){
            echo "<option value='" . $i . "'>" . $i. "</option>";
        }
        ?>
            </select>
            <a>A</a>
            <select name="aNosfin">
        <?php

        for ($i = 1888; $i <= 2019; $i++){
            echo "<option value='" . $i . "'>" . $i. "</option>";
        }
        ?>
            </select>
            <input type="submit" value="Buscar">
        </form>
        <br>

    <!------------------------- d -------------------------------------------------->
        <p>Consulta por productoras</p>
        <form action="/labmongo/buEspeciales/buscarD.php" method="post">
            <select name="productoras">
        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->find();

        foreach ( $data as $current )
            echo "<option value='" . $current['productora'] . "'>" . $current['productora']. "</option>";
        ?>
            </select>
            <input type="submit" value="Buscar">
        </form>
 <!------------------------- E -------------------------------------------------->
        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->count();
        echo "<br>";
        echo "Cantidad de pel&iacuteculas: " . $data;
        echo "<br>";

        $duraciones = $coleccion->aggregate(array(
            array(
                '$group' => array (
                    '_id' => '$productora',
                    'max' => array( '$max' => '$duracion' ),
                    'min' => array( '$min' => '$duracion' )
                )
            )
        ));

        foreach ($duraciones as $dato){
            echo "Productora: " . $dato['_id'] . ", ";
            echo "mayor duraci&oacuten: " . $dato['max'] . ", ";
            echo "menor duraci&oacuten: " . $dato['min'];
            echo "<br>";
        }


        ?>
    </body>
</html>

