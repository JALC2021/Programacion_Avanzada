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
        $ciudadOrigen = $_POST['ciudadOrigen'];
        echo count($ciudadOrigen);
        $pos = array(explode(";", $ciudadOrigen));
        print_r($pos);

        //Leemos las aerolineas
        $nombreAero = array();
        $lectura_txt_id_nombreAerolinea = fopen("iDnombreAerolinea.txt", 'r');    //modo lectura
        flock($lectura_txt_id_nombreAerolinea, LOCK_SH);  //bloqueo lectura

        $leerNomAero = fgetcsv($lectura_txt_id_nombreAerolinea, 999, ";");   //lee la primera linea
        while (!feof($lectura_txt_id_nombreAerolinea)) {
            $nombreAero[0][] = $leerNomAero[0];
            $nombreAero[1][] = $leerNomAero[1];
            $leerNomAero = fgetcsv($lectura_txt_id_nombreAerolinea, 999, ";");
        }
        flock($lectura_txt_id_nombreAerolinea, LOCK_UN);
        fclose($lectura_txt_id_nombreAerolinea);

        //leemos las ciudades destino para cada aerolinea
        $nombreDest = array();
        $lectura_txt_altaCompleta = fopen("altaCompleta.txt", 'r');   //modo lectura
        flock($lectura_txt_altaCompleta, LOCK_SH);  //bloqueo lectura
        $leerDest = fgetcsv($lectura_txt_altaCompleta, 999, ";");   //lee la primera linea
        while (!feof($lectura_txt_altaCompleta)) {
            $nombreDest[0][] = $leerDest[0];
            $nombreDest[1][] = $leerDest[1];
            $leerDest = fgetcsv($lectura_txt_altaCompleta, 999, ";");
        }
        flock($lectura_txt_altaCompleta, LOCK_UN);
        fclose($lectura_txt_altaCompleta);

//        $ciudadOrigen = $_POST['ciudadOrigen'];
//        echo count($ciudadOrigen);
//        $pos = array(explode(";", $ciudadOrigen));
//        print_r($pos);

        for ($i = 0; $i < count($nombreAero[0]); $i++) {
            if ($nombreAero[0][$i] == $pos[0][0]) {
                //imprimo el nombre de la aerolinea selecionoada en el origen
                ?> <h1> Aerol&iacute;nea Seleccionada: <?php echo $nombreAero[1][$i] ?></h1><?php
            }
        }

        $vOrigenes = array();
        ?><h3>Origen: <?php echo $pos[0][1]; ?> </h3> 
        <?php
        for ($k = 0; $k < count($nombreDest[0]); $k++) {
            if ($nombreDest[0][$k] == $pos[0][0]) {
                $vOrigenes[] = $nombreDest[1][$k];
            }
        }
        ?>
        <form method="post"action="">
            <?php
            $busquedaPos = array_search($pos[0][1], $vOrigenes);
            unset($vOrigenes[$busquedaPos]);
            ?>
            Destino:<br />
            <select>
                <?php foreach ($vOrigenes as $value) {
                    ?><option value="<?php echo $value; ?>"><?php echo $value; ?></option>  <?php
                }
                ?>
            </select>

            <br />Introduzca ti&eacute;mpo de vuelo: <br /><input type="time" name="tiempoVuelo" value="Enviar"><br />
            <br />Comprobar: <br /><input type="submit" name="enviarDestino" value="Enviar">
        </form>

    </body>
</html>
