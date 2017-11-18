<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>Epd_5_p1</title>
    </head>
    <body>
        <?php
        // recibo los datospara finalizar el alta de aerolinea con sus vuelos
        echo $idAerolinea = $_POST['id_aerolinea'];
        echo $nombreAerolineaSeleccionada = $_POST['nombreAerolinea'];
        echo $ciudadOrigen = $_POST['cOrigen'];
        echo $ciudadDestino = $_POST['cDestino'];
        echo $duracionVuelo = $_POST['tiempoVuelo'];

        //escribimos los datos del vuelo completo en vuelos.txt
        $escritura_txt_vuelos = fopen("vuelos.txt", 'a');   //abro escritura
        flock($escritura_txt_vuelos, LOCK_EX);  //bloqueo escritura
        fwrite($escritura_txt_vuelos, $idAerolinea . ";" . $nombreAerolineaSeleccionada . ";" . $ciudadOrigen . ";" . $ciudadDestino . ";" . $duracionVuelo . "\n");
        flock($escritura_txt_vuelos, LOCK_UN);
        fclose($escritura_txt_vuelos);  //cierro escritura
        ?>

    </body>
</html>
