<!DOCTYPE html>
<?php
session_start();

if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header("location:index.php");
}
?>
<?php
if (isset($_POST['btnRegistrar'])) {
    $conec = mysqli_connect("localhost", "user", "user");
    if (!$conec) {
        die('error en la conexion a la base de datos');
    }
//injeccion sql
    $nombreUsuario = mysqli_real_escape_string($conec, $_POST['usuario']);
    $contrasenya = mysqli_real_escape_string($conec, $_POST['password']);
    $email = mysqli_real_escape_string($conec, $_POST['email']);
    $talla = mysqli_real_escape_string($conec, $_POST['talla']);

    
    $selecBD = mysqli_select_db($conec, "tiendaropa");

    if (!$selecBD) {
        die('No se ha seleccionado la base de datos');
    }

    $query = "INSERT INTO `usuarios`(`nombre`, `clave`, `tipo`, `email`, `talla`) VALUES ('$nombreUsuario','$contrasenya','cliente','$email','$talla')";
    $resQuery = mysqli_query($conec, $query);

    if (!$resQuery) {
        echo ("error en la query");
    } else {
        echo ("registro completo");
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
        <h2>Registro de usuario</h2>
        <form action="#" method="POST">
            Nombre: <input type="text" name="usuario" value="" /> <br>
            Password: <input type="password" name="password" /> <br>
            Email: <input type="text" name="email" /> <br>
            Talla: <select name="talla">
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
            </select> <br><br>
            <input type="submit" name="btnRegistrar" value="Registrar"/>
            <input type="reset" name="btnCancelar" value="Cancelar"/> <br><br><br>   
            <input type="submit" name="logout" value="logout"/> <br><br><br>  

        </form>
    </body>
</html> 

