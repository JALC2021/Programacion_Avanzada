<!DOCTYPE html>
<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die('error en la conexion al servidor');
}
$selectBBDD = mysqli_select_db($conexion, "tiendaropa");
if (!$selectBBDD) {
    die('error en la conexion a la bbdd');
}

if (isset($_POST['btnLogin'])) {

//recojo los datos de usuario y password
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contrasenya = mysqli_real_escape_string($conexion, $_POST['password']);
//convierto la contraseña introducida a hash para poder comprobar si son iguales no.
    $pwd = password_hash($contrasenya, PASSWORD_DEFAULT);
//realizo la consulta para comprobar si existe el usuario
    $queryLogin = "SELECT * FROM `usuarios` WHERE `nombre` LIKE '" . $usuario . "'";
    $resQueryLogin = mysqli_query($conexion, $queryLogin);

    if (!$resQueryLogin) {
        die('error en la consulta' . mysqli_error($conexion));
    } else {

        if (mysqli_num_rows($resQueryLogin) > 0) {
            $fila = mysqli_fetch_array($resQueryLogin);

            if (password_verify($contrasenya, $fila['clave'])) {

                setcookie('nombreUsuario', $fila['nombre'], time() + (3600 * 24 * 30));
                $_SESSION['nombreUsuario'] = $fila['nombre'];
                $_SESSION['tipoUsuario'] = $fila['tipo'];
                header("location:listado_productos.php");
            } else {
                echo'usuario o contraseña no existen';
            }
        } else {
            echo'usuario o contraseña no existen';
        }
    }
    mysqli_close($conexion);
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

            <!-- creamos la coockie al usuario-->
            Usuario: <input type="text" name="usuario" value="<?php
            if (isset($_COOKIE['nombreUsuario'])) {
                echo $_COOKIE['nombreUsuario'];
            }
            ?>" /> <br>
            Password: <input type="password" name="password" /> <br><br>

            <input type="submit" name="btnLogin" value="Login"/>
            <input type="reset" name="btnCancelar" value="Cancelar"/> <br><br>                                
        </form>
        <form action="registro.php" method="POST">
            <input type="submit" name="btnRegistro" value="Registro"/>                                
        </form>
    </body>
</html> 
