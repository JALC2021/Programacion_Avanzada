<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EPD3_P2</title>
    </head>
    <body>
        <p>Cree una página PHP que genere la agenda de una consulta médica en la cual los campos que contendrá serán:
            médico, año, mes, día y horas disponibles de la agenda del médico de cada día. Inicialmente se deben declarar los vectores que
            contendrán cada tipo de información, esto es, los nombres de los médicos, años, meses, días cuantos días tiene cada mes y las
            horas en las que habrá huecos para insertar pacientes, dichas horas. Cree una función que reciba estos vectores e imprima, la
            agenda del día según el formato de ejemplo para el Dr.Galeno, el día 1 de Enero de 2016:</p>
        <p>*********************************************************************************************************************</p>
        <?php
        $nombres_medicos = array("Dr.Galeno", "Dr.Poyatos", "Dra.Benavides");
        $horas_pacientes = array("9.00", "9.30", "10.00", "10.30", "11.00", "11.30", "12.00", "12.30", "13.30");
        ?>
        <?php

        function citas($nombres_medicos, $horas_pacientes) {


            for ($index1 = 0; $index1 < count($nombres_medicos); $index1++) {

                echo $nombres_medicos[$index1] . ": Citas del día " . date("d") . " de  " . date("M") . " de " . date("Y");

                for ($index3 = 0; $index3 < count($horas_pacientes); $index3++) {

                    echo "<br>" . $horas_pacientes[$index3] . "h";
                }
                echo "<br>-------------------------------------------------------";
                echo "<br>";
            }
        }
        ?>
        <?php
        citas($nombres_medicos, $horas_pacientes);
        ?>

    </body>
</html>
