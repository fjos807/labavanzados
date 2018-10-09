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
        <form action="/labmongo/buEspeciales/buscarA.php" method="post">
            <select name="peliculas">
        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->find();

        foreach ( $data as $current )
            echo "<option value='" . $current['nombre'] . "'>" . $current['nombre']. "</option>";
        ?>
            </select>
            <input type="submit" value="Buscar">
        </form>
    <!------------------------- b -------------------------------------------------->
        <form action="nose">
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
    <!------------------------- c -------------------------------------------------->
            <form action="nose">
            <select name="aNos">
        <?php

        for ($i = 1888; $i <= 2019; $i++){
            echo "<option value='" . $i . "'>" . $i. "</option>";
        }
        ?>
            </select>
            <select name="aNosfin">
        <?php

        for ($i = 1888; $i <= 2019; $i++){
            echo "<option value='" . $i . "'>" . $i. "</option>";
        }
        ?>
            </select>

            <input type="submit" value="Buscar">
        </form>
    <!------------------------- d -------------------------------------------------->
        <form action="nose">
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

        <?php

        require 'vendor/autoload.php';
        $client = new MongoDB\Client;

        $base = $client ->labmongo;
        $coleccion = $base->peliculas;

        $data = $coleccion->count();

        echo $data;

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
            echo $dato['_id'];
            echo $dato['max'];
            echo $dato['min'];
        }

        $rango = array('anoestreno' => array ('$lt' => 2014, '$gt' => 1999));
        $fechas = $coleccion->find($rango);
        foreach ($fechas as $fech){
            echo $fech['nombre'];

        }
        ?>
    </body>
</html>

