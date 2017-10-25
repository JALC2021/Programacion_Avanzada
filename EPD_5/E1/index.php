<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_POST['envio'])) {
            if ($_FILES['archivo']['error'] > 0) {
                $error = 1;
                if ($_FILES['archivo']['error'] == UPLOAD_ERR_INI_SIZE) {
                    echo "Fichero demasiado grande";
                } else {
                    echo 'Error: ' . $_FILES['archivo']['error'] . '<br />';
                }
            } else {
                echo 'Nombre: ' . $_FILES['archivo']['name'] . '<br />';
                echo 'Tipo: ' . $_FILES['archivo']['type'] . '<br />';
                echo 'Tama&ntilde;o: ' . ($_FILES['archivo']['size'] / 1024) . ' Kb<br />';
                echo 'Almacenado en: ' . $_FILES['archivo']['tmp_name'];
                move_uploaded_file($_FILES['archivo']['tmp_name'], $_FILES['archivo']['name']);
            }
        }
        if (!isset($_POST['envio']) || isset($error)) {
            ?>
            <h1> Env&iacute;a un archivo </h1>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="archivo" /><br />
                <input type="submit" name="envio" value="Enviar" />
                <input type="reset" name="rest" value="Restaurar" />
            </form>
            <?php
        }
        ?>
    </body>
</html>
