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
                move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $nombreFoto);

                $usuario = $_SESSION['nombreUsuario'];

                $queryInsert = "INSERT INTO anuncios (titulo, texto, imagen, usuario, fechaPublicacion) VALUES ('$titulo', '$texto', '$nombreFoto', '$usuario', now())";
                $resQueryInsert = mysqli_query($conexion, $queryInsert);
                if ($resQueryInsert == NULL) {
                    echo "error en la subida";
                } else {
                    header("location:indexTrasLogin.php");
                }
            } else {
//                $errores[] = "Los formatos permitidos son .jpg/.png /.gif";
                echo"Los formatos permitidos son .jpg/.png /.gif";
//                $nombreFoto = NULL;
            }
        }
    }
}
mysqli_close($conexion);
?>


<html>
    <head>
        <title>Cien anuncios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>


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
