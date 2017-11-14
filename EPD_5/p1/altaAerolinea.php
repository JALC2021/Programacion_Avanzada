<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Epd_5_p1</title>
    </head>
    <body>
        <?php
        $nombreAerolinea = $_POST['nombreAerolinea'];
<<<<<<< HEAD
        $nDestinos = $_POST = ['nDestinos'];
<<<<<<< HEAD
<<<<<<< HEAD
        $f_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'a');
        $LecF_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'r');
        $f = fopen("ciudades.txt", 'r');
=======
        $escritura_txt_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'a');
        $lectura_txt_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'r');
        $lectura_txt_ciudades = fopen("ciudades.txt", 'r');
>>>>>>> parent of b885906... lo quiero asi
=======
        $f_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'a');
        $LecF_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'r');
        $f = fopen("ciudades.txt", 'r');
>>>>>>> parent of b0263d7... epd5_p1
=======
        $nDestinos = $_POST = ['nombreAerolinea'];
        $f_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'a');
>>>>>>> parent of fafd1cf... epd5_p1
        $id_aerolinea = NULL;
        $vectorIds = array();
        ?>

        <?php
        if (!isset($_POST['siguiente'])) {
            if (!isset($nombreAerolinea)) {
                $errores[] = 'Debe indicar el nombre de la erol&iacute;neaianea';
            }
            if (!isset($errores)) {

                if (filesize("id_nombreAerolinea.txt") <= 0) {

                    $id_aerolinea = 0;

                    $f_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'a');
                    flock($f_id_nombreAerolinea, LOCK_EX);  //bloqueo escritura
                    fwrite($f_id_nombreAerolinea, $id_aerolinea . ";" . $nombreAerolinea . ";" . "\n");
                    flock($f_id_nombreAerolinea, LOCK_UN);
                    fclose($f_id_nombreAerolineahandle);
                } else {

                    $f_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'r');
                    flock($f_id_nombreAerolinea, LOCK_SH);  //bloqueo lectura
                    $leerIdAero = fgetcsv($f_id_nombreAerolinea, ";");
                    while (!feof($f_id_nombreAerolinea)) {
                        $leerIdAero = fgetcsv($f_id_nombreAerolinea, ";");
                        for ($index = 0; $index < count($leerIdAero); $index++) {
                            $vectorIds[] = $leerIdAero[$index][$index];
                        }
                    }
                    echo "<br />";
                    echo $maxIds = max($vectorIds);
                    echo "<br />";
                    echo $id_aerolinea = $maxIds + 1;

                    flock($f_id_nombreAerolinea, LOCK_UN);
                    fclose($f_id_nombreAerolinea);

                    $f_id_nombreAerolinea = fopen("id_nombreAerolinea.txt", 'a');
                    flock($f_id_nombreAerolinea, LOCK_EX);
                    fwrite($f_id_nombreAerolinea, $id_aerolinea . ";" . $nombreAerolinea . ";" . "\n");
                    flock($f_id_nombreAerolinea, LOCK_UN);
                    fclose($f_id_nombreAerolinea);
                }
            }
        }
        ?>

        <h2>Seleccione Destino</h2>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <form method="post" action ="altaCompleta.php" name="alta">
            <select multiple size="8" name="vectorCiudadesDestino[]">
                <?php
//                $f = fopen("ciudades.txt", 'r');
                if ($f) {
                    flock($f, LOCK_SH);
                    $ciudades = fgetcsv($f, 999, ",");
                    while (!feof($f)) {
                        $ciudades = fgetcsv($f, 999, ",");
                        ?>
                        <option value="Roma"><?php echo $ciudades[0] ?></option>
                        <option value="Paris"><?php echo $ciudades[1] ?></option>
                        <option value="Londres"><?php echo $ciudades[2] ?></option>
                        <option value="Dublin"><?php echo $ciudades[3] ?></option>
                        <option value="Sevilla"><?php echo $ciudades[4] ?></option>
                        <option value="Madrid"><?php echo $ciudades[5] ?></option>
                        <option value="Barcelona"><?php echo $ciudades[6] ?></option>
                        <option value="Amsterdam"><?php echo $ciudades[7] ?></option>
                        <?php
                    }

                    flock($f, LOCK_UN);
                    fclose($f);
                } else {
                    echo "error en el fichero";
                }
                ?>

            </select>

=======

=======
>>>>>>> parent of b0263d7... epd5_p1
        <form method="post" action ="altaCompleta.php" name="alta">
            <select multiple size="8" name="vectorCiudadesDestino[]">
=======
        <form method="post" action ="" name="alta">
            <select size="8" multiple>
>>>>>>> parent of fafd1cf... epd5_p1
                <?php
                $f = fopen("ciudades.txt", 'r');
                if ($f) {
                    flock($f, LOCK_SH);
                    $ciudades = fgetcsv($f, 999, ",");
                    while (!feof($f)) {
                        $ciudades = fgetcsv($f, 999, ",");
                        ?>
                        <option value="Roma"><?php echo $ciudades[0] ?></option>
                        <option value="Paris"><?php echo $ciudades[1] ?></option>
                        <option value="Londres"><?php echo $ciudades[2] ?></option>
                        <option value="Dublin"><?php echo $ciudades[3] ?></option>
                        <option value="Sevilla"><?php echo $ciudades[4] ?></option>
                        <option value="Madrid"><?php echo $ciudades[5] ?></option>
                        <option value="Barcelona"><?php echo $ciudades[6] ?></option>
                        <option value="Amsterdam"><?php echo $ciudades[7] ?></option>
                        <?php
                    }

                    flock($f, LOCK_UN);
                    fclose($f);
                } else {
                    echo "error en el fichero";
                }
                ?>
            </select>
<<<<<<< HEAD

>>>>>>> parent of b885906... lo quiero asi
            <input type="hidden" name="id_aerolinea" value="<?php echo $id_aerolinea; ?>">
            <input type="hidden" name="nombreAerolinea" value="<?php echo $_POST['nombreAerolinea']; ?>">
=======
>>>>>>> parent of fafd1cf... epd5_p1
            <input type="submit" name="enviarDestino" value="Enviar">
        </form>
    </body>
</html>

