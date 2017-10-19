<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EPD3_P4</title>
    </head>
    <body>
        <p>Cree una función PHP a la que se le pase como argumento una matriz con los tiempos de actividad física de varias
            personas medidos mediante una pulsera inteligente. Existen tres tipos de tiempos: reposo, caminando y corriendo. Esta matriz
            contendrá en cada fila los tiempos de una persona y en cada columna el tiempo (medido en minutos) en el que ha estado en
            reposo, caminando y corriendo (tres columnas). La función deberá generar una página web que (haciendo uso de tablas) muestre
            los tiempos de todas las personas, así como el porcentaje del tiempo total que supone el tiempo en el que cada persona ha estado
            en reposo. Por último, deberá añadirse una última fila con la media de tiempo por cada tipo de tiempo (reposo, caminando y
            corriendo) teniendo en cuenta el tiempo de todas las personas. Para comprobar el funcionamiento de la función desarrollada, cree
            una página PHP que llame a ésta usando una matriz predefinida por usted.</p>
        <p>***********************************************************************************************************************</p>

        <?php
        $persona1 = array(3, 10, 5);
        $persona2 = array(6, 20, 14);
        $persona3 = array(10, 15, 30);
        $matriz = array($persona1, $persona2, $persona3);


//        $sum=array_sum($persona1);
//        $persona1[]=$sum;
//        foreach ($persona1 as $value) {
//            echo $value. " ";
//        }
        ?>
        <?php

        function mediaTiempo($m) {
            $maux = $m;

            $aux_min = array();
            $minutos = 0;

            for ($nfil = 0; $nfil < count($m); $nfil++) {

                for ($ncol_valor = 0; $ncol_valor < count($m[$nfil]); $ncol_valor++) {

                    $minutos += $m[$nfil][$ncol_valor];
                }
                $aux_min[$nfil] = $minutos;

                $minutos = 0;
            }

            for ($index = 0; $index < count($maux); $index++) {

                for ($index1 = 0; $index1 < count($maux); $index1++) {
                    echo $maux[$index][$index1] . "  ---  ";
                }
                echo "<br>";
            }
            

//            foreach ($aux_min as $value) {
//                echo $value . " ";
//                echo "<br>";
//            }
//            echo "<br>";
        }
        ?>

        <?php

        function matrizInicial($matriz) {
            echo "<table border=1>";
            echo "<caption>Tabla de Datos</caption>";
            echo "<thead>";
            echo "<tr>";
            //echo "<th>Persona</th>";
            echo "<th>Reposo'</th>";
            echo "<th>Caminando'</th>";
            echo "<th>Corriendo'</th>";
            echo "</tr>";
            echo "</thead>";


            foreach ($matriz as $fila) {
                echo "<tr>";
                echo"<tbody>";
                echo "<tr>";

                foreach ($fila as $columna) {
                    //echo"<td>$fila</td>";
                    echo "<td>$columna</td>";
                }
                echo "</tr>";
            }
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        }
        ?>

        <?php
        matrizInicial($matriz);
        mediaTiempo($matriz);
        ?>

    </body>
</html>
