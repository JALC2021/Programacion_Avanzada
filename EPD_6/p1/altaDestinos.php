<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>Epd_6_p1</title>
    </head>
    <body>
        <?php
        if (!isset($_POST['enviarDestino'])) {
            $numreroDesinos = $_POST['numeroDestinos'];
            ?><h2>Elige Destinos</h2><?php
            $vectorCiudades = array();
            $conexion = mysqli_connect("localhost", "user", "user");
            if (!$conexion) {
                die('No puedo conectar:' . mysqli_error($conexion));
            }
            $db_selected = mysqli_select_db($conexion, "epd6Aerolineas");
            if (!$db_selected) {
                die('No puedo usar la base de datos: ' . mysqli_error($conexion));
            }
            $queryCiudades = "SELECT * FROM `ciudades`";
            $result = mysqli_query($conexion, $queryCiudades);

            while ($fila = mysqli_fetch_array($result)) {

                $vectorCiudades[] = $fila[0];
            }

            if (!$result) {
                die('Error al ejecutar la consulta: ' . mysqli_error($conexion));
            }
            mysqli_close($conexion);
            ?>

            <?php $numeroDestino = $_POST['numeroDestinos']; ?>
            <form method = "post" action = "aerolineaCompleta.php">
                <?php
                for ($i = 0; $i < $numeroDestino; $i++) {
                    ?>
                    <p>Destino <?php echo $i + 1 ?> </p>

                    <select  size="8">    
                        <?php
                        foreach ($vectorCiudades as $ciudad) {
                            ?><option value="<?php echo $ciudad ?>"><?php echo $ciudad ?></option><?php
                        }
                        ?>
                    </select>
                    <?php
                }
                ?><br /> <input type="submit" name="enviarDestino" value="Enviar"><?php
            } else {

                $conexion = mysqli_connect("localhost", "user", "user");
                if (!$conexion) {
                    die('No puedo conectar:' . mysqli_error($conexion));
                }

                $db_selected = mysqli_select_db($conexion, "epd6Aerolineas");
                if (!$db_selected) {
                    die('No puedo usar la base de datos: ' . mysqli_error($conexion));
                }
                $sql = "INSERT INTO `altaAerolinea`(`idAerolinea`, `nombreAerolinea`, `numeroDestinos`) VALUES (NULL,'$_POST[nombreAerolinea]','$_POST[numeroDestinos]')";
                $result = mysqli_query($conexion, $sql);
                if (!$result) {
                    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
                }
                mysqli_close($conexion);
            }
            ?>

        </form>
    </body>
</html>
