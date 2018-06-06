<?php

$mysqli_host = "localhost";
$mysqli_databse = "cienanuncios";
$mysqli_user = "root";
$mysqli_password = "";

if (!$conexion = mysqli_connect($mysqli_host, $mysqli_databse, $mysqli_user, $mysqli_password)) {
    die("error en la conexion al servidor" . mysqli_error());
}
$BBDD_selected = mysqli_select_db($conexion, $mysqli_databse);

if (!$BBDD_selected) {
    mysqli_close($conexion);
    die("error en la conexio a la bbdd" . mysqli_error());
}

?>

