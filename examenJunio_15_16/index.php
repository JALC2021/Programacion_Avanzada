<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion) {
    die('error en la conexion al servidor');
}

$selecBDDD = mysqli_select_db($conexion, "cienanuncios");
if (!$selecBDDD) {
    die('No se ha seleccionado la base de datos');
}

$query = "SELECT * FROM `anuncios` ORDER BY fechaPublicacion DESC";

$resQuery = mysqli_query($conexion, $query);

if (mysqli_num_rows($resQuery) < 1) {
    echo("error en la consulta");
} else {
    ?>

    <html>
        <head>
            <title>Cien anuncios</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head>
        <body>
            <div>
                <h1>Cien anuncios - Anuncios por palabras</h1>
            </div>
            <?php
            if (mysqli_num_rows($resQuery) == 0) {
                ?><p>!!El usuario no tiene contenido!!</p><?php
            } else {
                while ($fila = mysqli_fetch_array($resQuery)) {
                    ?>
                    <div style="float: left; width: 30em;">
                        <div>
                            <h2><?php echo($fila['titulo']); ?></h2>
                            <div>
                                Anuncio n&uacute;mero: <?php echo($fila['id']); ?> - <?php echo($fila['fechaPublicacion']); ?>
                            </div>
                            <div>
                                <?php if (($fila['imagen']) == NULL) {
                                    ?><p>!!No tiene foto!!</p><?php
                                } else {
                                    ?>          
                                    <img src="images/<?php echo($fila['imagen']); ?>" style="max-width: 90%">
                                <?php } ?>
                            </div>
                            <p style="max-width: 90%">

                                <?php
                                if (isset($fila['texto'])) {
                                    echo($fila['texto']);
                                } else {
                                    ?><p>!!No tiene texto!!</p><?php }
                                ?>

                        </div>

                        <?php
                    }
                }
                //mysqli_free_result($resQuery);
            }

            if (isset($_POST['login'])) {

                $usuario = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
                $password = mysqli_real_escape_string($conexion, $_POST['password']);
                $passwordHash = md5(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));

                $queryConpruebaUsuario = "SELECT * FROM `users` WHERE username = '$usuario' and password = '$passwordHash'";
                $resqueryConpruebaUsuario = mysqli_query($conexion, $queryConpruebaUsuario);
                if (mysqli_num_rows($resqueryConpruebaUsuario) < 1) {
                    echo("usuario o contraseña incorrecto");
                } else {
                    $filaCompruebaUSuario = mysqli_fetch_array($resqueryConpruebaUsuario);
                    //creo ariable de session
                    $_SESSION['nombreUsuario'] = $usuario;
                    header("location:indexTrasLogin.php");
                    //creo la cookie
                    setcookie('nombreUsuario', $usuario, time() + (3600 * 24 * 30));
                }
            }
            //mysqli_free_result($resqueryConpruebaUsuario);
            mysqli_close($conexion);
            ?>
            <div style="float:left; width: 10em;">
                <form action="#" method="post">
                    <?php if (isset($_COOKIE['nombreUsuario'])) { ?>
                        Usuario: <input type="text" name="username" value="<?php echo $_COOKIE['nombreUsuario']; ?>">
                    <?php } else { ?>
                        Usuario: <input type="text" name="username" value="">
                    <?php } ?>
                    Contrase&ntilde;a: <input type="password" name="password">
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
    </body>
</html>
