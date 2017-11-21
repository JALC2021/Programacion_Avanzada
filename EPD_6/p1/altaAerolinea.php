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
    <?php
    if (!isset($_POST['siguiente'])) {
        ?><article>
            <section>
                <h1>Opciones</h1>
                <a href="altaAerolinea.php">Alta Aerol&iacute;nea</a>
                <a href="altaVuelos.php">Alta Vuelos</a>
                <a href="informeResumen.php">Informe Resumen</a>
            </section>
        </article>

        <form method="post" action ="altaDestinos.php" name="alta">
            Nombre: <br /><input type="text" name="nombreAerolinea" /><br />
            N&uacute;mero de Destinos:<br /><input type="number" name="numeroDestinos" min="2" max="8" /><br />
            <input type="submit" name="siguiente" value="Siguiente" />
        </form>		

        <?php
    }
        ?>
</body>
</html>
