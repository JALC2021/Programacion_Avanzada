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
    if (isset($_POST['siguiente'])) {
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
//        $filtros = Array(
//            'user' => FILTER_SANITIZE_STRING,
//            'pass' => FILTER_SANITIZE_STRING
//        );
//        $entradas = filter_input_array(INPUT_POST, $filtros);
//        echo $entradas['user'];
//        echo '<br/>';
//        echo $_POST['user'];
//        echo '<br/>';
//        echo!($entradas['user'] == $_POST['user']);
//        $sql = "SELECT * FROM usuarios WHERE usuario='$entradas[user]' AND contrasenya='$entradas[pass]'";
//        echo "<h2>$sql</h2>";
//
//        echo 'Magic quotes:' . get_magic_quotes_gpc();
        $sql = "INSERT INTO `altaAerolinea`(`idAerolinea`, `nombreAerolinea`, `numeroDestinos`) VALUES (NULL,'$_POST[nombreAerolinea]','$_POST[numeroDestinos]')";
        $result = mysqli_query($conexion, $sql);
        if (!$result) {
            die("Error al ejecutar la consulta: " . mysqli_error($conexion));
        }
        mysqli_close($conexion);
    } else {
        ?>
        <form method="post" action ="" name="alta">
            Nombre: <br /><input type="text" name="nombreAerolinea"><br />
            N&uacute;mero de Destinos:<br /><input type="number" name="numeroDestinos" min="2" max="8"><br />
            <input type="submit" name="siguiente" value="Siguiente">
        </form>		

        <?php
    }
    ?>
</body>
</html>
