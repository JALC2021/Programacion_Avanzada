<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>Epd_5_p1</title>
    </head>
    <body>
        <h2>Alta Aerol&iacute;nea</h2>
        <form method="post" action ="altaAerolinea.php" name="alta">
            Nombre: <br /><input type="text" name="nombreAerolinea"><br />
            N&uacute;mero de Destinos:<br /><input type="number" name="nDestinos" min="2" max="8"><br />
            <input type="submit" name="siguiente" value="Siguiente">
        </form>
    </body>
</html>
