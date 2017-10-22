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

        <h1>Citas M&eacute;dicas</h1> 
        <?php

        function citasMedicas($m, $horasDisponibles) {

            foreach ($m as $value) {
                echo $value . " ";
            }
            foreach ($horasDisponibles as $value2) {
                echo "<br/>" . $value2 . "h";
            }

            echo "<br/>************************<br/>";
        }

        $m1 = array("Dr.Galeno:", 1, "Octubre", 2017);
        $horasDisponibles1 = array(9.00, 10.00, 11.30, 12.00, 13.30);


        $m2 = array("Dr.Vinagre:", 18, "Noviembre", 2017);
        $horasDisponibles2 = array(9.30, 10.00, 12.00, 13.30);

        $m3 = array("Dr.Nene:", 30, "Diciembre", 2017);
        $horasDisponibles3 = array(9.00, 9.30, 10.00, 10.30, 11.00, 11.30, 12.00, 12.30, 13.00, 13.30);

        $m4 = array("Dr.Ganso:", 13, "Enero", 2018);
        $horasDisponibles4 = array(12.00, 13.30);



        citasMedicas($m1, $horasDisponibles1);
        citasMedicas($m2, $horasDisponibles2);
        citasMedicas($m3, $horasDisponibles3);
        citasMedicas($m4, $horasDisponibles4);
        ?>

    </body>
</html>
