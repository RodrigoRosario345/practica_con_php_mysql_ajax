<?php

session_start();


if(isset($_SESSION['usuario'])) {
    header('Location: contenidoMostrar.php');
}
else {
    header('Location: registroMostrar.php');
}







?>