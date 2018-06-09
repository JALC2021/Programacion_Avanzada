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

if (isset($_POST['create'])) {

    if (!isset($_POST['title']) || empty(isset($_POST['title']))) {
        $errores[] = "Introduce un titulo de foto";
    }
    if (!isset($_POST['bodyText']) || empty(isset($_POST['bodyText']))) {
        $errores[] = "Introduzca un texto para describir la foto";
    }

    if (isset($_FILES['image'])) {

        if ($_FILES['image']['size'] > 2 * (pow(1024, 2))) {
            $errores[] = "El tamaño permitido son 2MB";
            echo "El tamaño permitido son 2MB";
        } else {
            if ($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/gif') {

                $titulo = $_POST['title'];
                $texto = $_POST['bodyText'];

                $nombreFoto = $_FILES['image']['name'];

                //comprueba que las nombres de las fotos no esten dupliados
                $numeroImagenesAlmacenadas = count(glob('images/' . $nombreFoto, GLOB_BRACE));
                if ($numeroImagenesAlmacenadas > 0) {
                    $errores[] = "cambie el nombre de la imagen";
                } else {


                    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $nombreFoto);

                    $usuario = $_SESSION['nombreUsuario'];

                    $queryInsert = "INSERT INTO anuncios (titulo, texto, imagen, usuario) VALUES ('$titulo', '$texto', '$nombreFoto', '$usuario')";
                    $resQueryInsert = mysqli_query($conexion, $queryInsert);
                    if (!$resQueryInsert) {
                        echo "error en la subida";
                    } else {
                        header("location:indexTrasLogin.php");
                    }
                }
            } else {
                $errores[] = "Los formatos permitidos son .jpg/.png /.gif";
            }
        }
    }
// no funciona bien no se por que.
//    if (!isset($_FILES['image'])) {
//        
//
//        $tituloSinImagen = $_POST['title'];
//        $textoSinImagen = $_POST['bodyText'];
//        $nombreFotoSinFoto = NULL;
//        $usuarioSinImagen = $_SESSION['nombreUsuario'];
//
//        $queryInsertSinImagen = "INSERT INTO anuncios (titulo, texto, imagen, usuario) VALUES ('$tituloSinImagen', '$textoSinImagen', '$nombreFotoSinFoto', '$usuarioSinImagen')";
//        $resQueryInsertSinImagen = mysqli_query($conexion, $queryInsertSinImagen);
//        if ($resQueryInsertSinImagen == NULL) {
//            echo "error en la subida";
//        } else {
//            header("location:indexTrasLogin.php");
//        }
//    }

    mysqli_close($conexion);
}
?>


<html>
    <head>
        <title>Cien anuncios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        if (!isset($_POST['create']) or isset($errores)) {
            if (isset($errores)) {
                echo "<ul style=color:red>";
                foreach ($errores as $value) {
                    echo "<li>$value</li>";
                }
                echo "</ul>";
            }
        }
        ?>

        <h1>Nuevo anuncio</h1>
        <div>
            <form action = "#" method = "post" enctype = "multipart/form-data" >
                T&iacute;tulo: <input type = "text" name = "title"><br>
                Texto: <textarea name = "bodyText"></textarea><br >
                Im&aacute;gen (opcional): <input type = "file" name = "image"><br>
                <button type = "submit" name = "create">Crear</button>
            </form>
        </div>
    </body>
</html>
