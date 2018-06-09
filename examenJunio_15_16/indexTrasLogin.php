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

$sessionUsuario = $_SESSION['nombreUsuario'];
$queryUsuarioLogado = "SELECT * FROM `anuncios` WHERE usuario LIKE '$sessionUsuario'";
$resQueryUsuarioLogado = mysqli_query($conexion, $queryUsuarioLogado);

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:index.php');
}

if (isset($_POST['create'])) {
    header('location:nuevo.php');
}

if (isset($_POST['delete'])) {
    $idImagen = $_POST['id'];
    $queryDelete = "DELETE FROM `anuncios` WHERE id ='$idImagen'";
    $resQureyDelete = mysqli_query($conexion, $queryDelete);
    header("location:indexTrasLogin.php");
}
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
        if (mysqli_num_rows($resQueryUsuarioLogado) == 0) {
            ?><p>!!El usuario no tiene contenido!!</p><?php
        } else {
            while ($fila = mysqli_fetch_array($resQueryUsuarioLogado)) {
                ?>
                <div style="float: left; width: 30em;">
                    <div>
                        <h2><?php echo $fila['titulo']; ?></h2>
                        <div>
                            Anuncion n&uacute;mero:  <?php echo($fila['id']); ?> - <?php echo($fila['fechaPublicacion']); ?>
                        </div>
                        <div>
                            <form action="#" method="post">
                                <input type="hidden" name="id" value="<?php echo($fila['id']); ?>">
                                <button type="submit" name="delete">Borrar</button>
                            </form>
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
            mysqli_close($conexion);
            ?>


            <div style="float:left; width: 10em;">
                Bienvenido <strong><?php echo $_SESSION['nombreUsuario'] ?></strong>
                <form action="#" method="post">
                    <button type="submit" name="create">Nuevo anuncio</button><br>
                    <button type="submit" name="logout">Salir</button>
                </form>
            </div>

    </body>
</html>
