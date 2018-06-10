<!DOCTYPE html>
<?php
session_start();
$usuarioSession = $_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
if (isset($_POST['btnLogout'])) {
    session_destroy();
    header('location:login.php');
}

$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die('error en la conexion al servidor');
}
$selectBBDD = mysqli_select_db($conexion, "tiendaropa");
if (!$selectBBDD) {
    die('error en la conexion a la bbdd');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PA - Examen PHP (Diciembre, 2017)</title>
    </head>
    <body>
        <h1>Tienda de ropa</h1>
        <h2>Bienvenido <?php echo $tipoUsuario . " " . $usuarioSession ?></h2>
        <form action='#' method='POST'>
            <input type='submit' name='btnLogout' value='Cerrar sesi&oacute;n'/>                
        </form>
        <hr>
        <table cellpadding="10" border="1">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tallas y precios</th>
            </tr>
            <?php
            $queryListaArticulos = "SELECT * FROM productos";
            $resQueryListaArticulos = mysqli_query($conexion, $queryListaArticulos);

            if (!$resQueryListaArticulos) {
                die('error al ejecutar la consulta' . mysqli_error("$conexion"));
            } else {
                if (mysqli_num_rows($resQueryListaArticulos) < 1) {
                    echo 'Lista Vacia';
                } else {
                    while ($fila = mysqli_fetch_array($resQueryListaArticulos)) {
                        $tallas = $fila['tallas'];
                        $precios =$fila['precios'];
                        ?>
                        <tr>  
                            <td><form action="#" method="POST"><input type="checkbox" name="<?php echo $fila['id'] ?>" value="<?php echo $fila['nombre'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $fila['id'] ?>"/></form></td>
                            <td align='center'><img src='img/<?php echo $fila['imagen'] ?>' alt='<?php echo $fila['imagen'] ?>' width='100'></td>
                            <td align='center'><?php echo $fila['nombre'] ?></td>
                            <td align='center'><?php echo $fila['descripcion'] ?></td>
                            <td align='center'>
                                <ul type="square">
                                    <?php
                                    for ($i = 0; $i < sizeof($tallas); $i++) {
                                        echo "<li>$tallas[$i]:$precios[$i]</li>";
                                    }
                                    ?>
                                </ul>
                            </td>  
                        </tr>

                        <?php
                    }
                }
            }
            ?>

        </table>
        <?php mysqli_close($conexion); ?>

        <?php
        if ($tipoUsuario == 'cliente') {
            ?>
            <form action="#" method="POST">
                <input type="submit" name="btnRealizarPedido" value="Realizar pedido"/> 
            </form>
            <?php
        } else {
            ?>  
            <form action="#" method="POST">
                <input type="submit" name="btnEliminar" value="Eliminar productos seleccionados"/> 
            </form>

            <form action="alta_producto.php" method="POST">
                <input type="submit" name="bntAlta" value="Alta producto" />
            </form>
            <?php
        }
        ?>
    </body>
</html>

