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

        flock($f_id_nombreAerolinea_Dest, LOCK_EX);  //bloqueo escritura
        fwrite($f_id_nombreAerolinea_Dest, $id_aerolinea . ";");
        foreach ($vecCiudDest as $ciudad) {
            fputcsv($f_id_nombreAerolinea_Dest, $ciudad, ";");
        }
        flock($f_id_nombreAerolinea_Dest, LOCK_UN);
        fclose($f_id_nombreAerolinea_Dest);
        ?>
        <h2>Aerol&iacute;neas registradas</h2>

        <?php
        //Leemos las aerolineas
        flock($LecF_id_nombreAerolinea, LOCK_SH);  //bloqueo lectura
        $leerIdAero = fgetcsv($LecF_id_nombreAerolinea, 999, ";");   //lee la primera linea

        while (!feof($LecF_id_nombreAerolinea)) {
            $leerNomAero = fgetcsv($LecF_id_nombreAerolinea, 999, ";");
            echo "<h4>$leerNomAero[1]</h4>";
        }
        ?>

        <form>

            <input type="submit" name="enviarDestino" value="Enviar">
        </form>
    </body>
</html>
