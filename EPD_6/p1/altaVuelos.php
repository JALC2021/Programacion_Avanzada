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
//        if (isset($_POST['enviarDestino'])) {
        ?><article>
            <section>
                <h1>Opciones</h1>
                <a href="altaAerolinea.php">Alta Aerol&iacute;nea</a>
                <a href="altaVuelos.php">Alta Vuelos</a>
                <a href="informeResumen.php">Informe Resumen</a>
            </section>
        </article>
        <?php
        $conexion = mysqli_connect("localhost", "user", "user");
        if (!$conexion)
            die('No puedo conectar:' . mysqli_error($conexion));

        $db_selected = mysqli_select_db($conexion, "epd6Aerolineas");
        if (!$db_selected)
            die('No puedo usar la base de datos: ' . mysqli_error($conexion));

//            $queryNumeroDestinos="";
        $queryCiudades = "SELECT * FROM ciudades";
        $result = mysqli_query($conexion, $queryCiudades);

        while ($fila = mysqli_fetch_array($result)) {
            //echo $fila['ciudad'];
            $vectorCiudades[]=$fila;
            
        }
        echo count($fila);
        if (!$result) {
            die("Error al ejecutar la consulta: " . mysqli_error($conexion));
        }
        mysqli_close($conexion);
//        } else {
        ?>
        <form method="post" action ="" name="altaComleta">  

            <?php
            for ($i = 0; $i < 8; $i++) {
                ?>
                <p>Destino <?php echo $i + 1 ?> </p>

                <select  size="8">    
                    <?php
//                        foreach ($fila as $ciudad) {
                    for ($index = 0; $index < count( $vectorCiudade); $index++) {
                        ?><option value="<?php echo $fila[$index]; ?>"><?php echo $fila[$index]; ?></option><?php
                    }
                }
                ?>
            </select>
            <?php // }  ?>
            <br /> <input type="submit" name="enviarDestino" value="Enviar">
        </form>	

        <?php
//        }
        ?>
    </body>
</html>
