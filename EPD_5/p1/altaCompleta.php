<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>ALTA AEROLINEA: OK</h2>
        <?php
        $vecCiudDest[] = $_POST['vectorCiudadesDestino'];
        $id_aerolinea = $_POST['id_aerolinea'];
        $nombreAerolinea = $_POST['nombreAerolinea'];
        $f_id_nombreAerolinea_Dest = fopen("altaCompleta.txt", 'a');
        $LecF_id_nombreAerolinea= fopen("id_nombreAerolinea.txt", 'r');

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of b0263d7... epd5_p1
        flock($f_id_nombreAerolinea_Dest, LOCK_EX);  //bloqueo escritura
        fwrite($f_id_nombreAerolinea_Dest, $id_aerolinea . ";");
        foreach ($vecCiudDest as $ciudad) {
            fputcsv($f_id_nombreAerolinea_Dest, $ciudad, ";");
<<<<<<< HEAD
        }
        flock($f_id_nombreAerolinea_Dest, LOCK_UN);
        fclose($f_id_nombreAerolinea_Dest);
=======
        flock($escritura_txt_altaCompleta, LOCK_EX);  //bloqueo escritura

        for ($c = 0; $c < count($vectorCiudadesDestino); $c++) {

            fwrite($escritura_txt_altaCompleta, $id_aerolinea . ";" . $vectorCiudadesDestino[$c] . "\n");
        }
        flock($escritura_txt_altaCompleta, LOCK_UN);
        fclose($escritura_txt_altaCompleta);
>>>>>>> parent of b885906... lo quiero asi
=======
        }
        flock($f_id_nombreAerolinea_Dest, LOCK_UN);
        fclose($f_id_nombreAerolinea_Dest);
>>>>>>> parent of b0263d7... epd5_p1
        ?>
        <h2>Aerol&iacute;neas registradas</h2>

        <?php
        //Leemos las aerolineas
<<<<<<< HEAD
<<<<<<< HEAD
        flock($LecF_id_nombreAerolinea, LOCK_SH);  //bloqueo lectura
        $leerIdAero = fgetcsv($LecF_id_nombreAerolinea, 999, ";");   //lee la primera linea

        while (!feof($LecF_id_nombreAerolinea)) {
            $leerNomAero = fgetcsv($LecF_id_nombreAerolinea, 999, ";");
            echo "<h4>$leerNomAero[1]</h4>";
        }
        ?>

        <form>

            <input type="submit" name="enviarDestino" value="Enviar">
=======
        $nombreAero = array();
        flock($lectura_txt_id_nombreAerolinea, LOCK_SH);  //bloqueo lectura
        $leerNomAero = fgetcsv($lectura_txt_id_nombreAerolinea, 999, ";");   //lee la primera linea
        while (!feof($lectura_txt_id_nombreAerolinea)) {
            $leerNomAero = fgetcsv($lectura_txt_id_nombreAerolinea, 999, ";");

            echo $nombreAero[] = $leerNomAero[0] . "<->" . $leerNomAero[1] . "<br />";
        }
        //leemos las ciudades destino para cada aerolinea
        $nombreDest = array();
        flock($lectura_txt_altaCompleta, LOCK_SH);  //bloqueo lectura
        $leerDest = fgetcsv($lectura_txt_altaCompleta, 999, ";");   //lee la primera linea
        while (!feof($lectura_txt_altaCompleta)) {
            $leerDest = fgetcsv($lectura_txt_altaCompleta, 999, ";");
=======
        flock($LecF_id_nombreAerolinea, LOCK_SH);  //bloqueo lectura
        $leerIdAero = fgetcsv($LecF_id_nombreAerolinea, 999, ";");   //lee la primera linea
>>>>>>> parent of b0263d7... epd5_p1

        while (!feof($LecF_id_nombreAerolinea)) {
            $leerNomAero = fgetcsv($LecF_id_nombreAerolinea, 999, ";");
            echo "<h4>$leerNomAero[1]</h4>";
        }
        ?>

        <form>

<<<<<<< HEAD
                if ($nombreAero[0] == $nombreDest[0]) {
                    echo "-->" . $nombreDest[$inde];
                }
//                    echo"<input type='radio' name='destinos'>" . $nombreDest[$inde];
//                    echo "</article>";
            }
        }
        ?>
        <form method="post" action="altaVuelos.php">
            <br />
            Seleccione Origen y pulse: <input type="submit" name="enviarDestino" value="Enviar">
            
>>>>>>> parent of b885906... lo quiero asi
=======
            <input type="submit" name="enviarDestino" value="Enviar">
>>>>>>> parent of b0263d7... epd5_p1
        </form>
    </body>
</html>
