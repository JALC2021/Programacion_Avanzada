<!DOCTYPE html>
<?php
session_start();
if (isset($_POST['btnLogin'])) {

    $conec = mysqli_connect("localhost", "user", "user");
    if (!$conec) {
        die('error en la conexion a la base de datos');
    }
//injeccion sql
    $nombreUsuario = mysqli_real_escape_string($conec, $_POST['usuario']);
    $contrasenya = mysqli_real_escape_string($conec, $_POST['password']);
//    $pwd= password_hash($contrasenya);

    $selecBD = mysqli_select_db($conec, "tiendaropa");

    if (!$selecBD) {
        die('No se ha seleccionado la base de datos');
    }
//    $query = "SELECT * FROM `usuarios` WHERE `nombre` LIKE '$nombreUsuario' AND `clave` LIKE '$contrasenya'";

    $query = "SELECT * FROM `usuarios` WHERE `nombre` LIKE '$nombreUsuario'";
    $resQuery = mysqli_query($conec, $query);
    if (mysqli_num_rows($resQuery) < 1) {
        echo('el usuario no coinciden');
    } else {
        $fila = mysqli_fetch_array($resQuery);
        echo ($fila [2]);
    }
    if (password_verify($contrasenya, $fila['clave'])) {
        echo ("login correcto");
        $_SESSION['nombreUsuario'] = $_POST['usuario'];
        header("location:listado_productos.php");
    }

    mysqli_close($conec);
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>PA - Examen PHP (Diciembre, 2017)</title>
    </head>
    <body>
        <h1>Tienda de ropa</h1>
        <h2>Login</h2>
        <form action="#" method="POST">
            Usuario: <input type="text" name="usuario" value="" /> <br>
            Password: <input type="password" name="password" /> <br><br>

            <input type="submit" name="btnLogin" value="Login"/>
            <input type="reset" name="btnCancelar" value="Cancelar"/> <br><br>                                
        </form>
        <form action="registro_usuario.php" method="POST">
            <input type="submit" name="btnRegistro" value="Registro"/>                                
        </form>
    </body>
</html> 
