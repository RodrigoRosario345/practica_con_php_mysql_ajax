<?php

session_start();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad'])) {
    echo "Se han enviado los datos correctamente"."<br><br>";

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['edad'] = $edad;

    header('Location: formulario.php');
}
else {
    echo "No se han enviado los datos correctamente"."<br><br>";
}



?>