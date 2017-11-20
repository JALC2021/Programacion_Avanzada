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
        <form method="get" action=".">
            <input type="submit" name="altaAerolinea" value="Alta Aerolinea"> 
            <input type="submit" name="altaVuelos" value="Alta Vuelos"> 
            <input type="submit" name="informeResumen" value="Informe Resumen"> 
        </form>
        <?php
        if (isset($_GET['altaAerolinea'])) {
            require './altaAerolinea.php';
        }
        if (isset($_GET['altaVuelos'])) {
            require './altaVuelos.php';
        }
        if (isset($_GET['informeResumen'])) {
            require './informeResumen.php';
        }
        ?>
    </body>
</html>
