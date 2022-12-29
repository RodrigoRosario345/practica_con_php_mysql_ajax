<?php

session_start();

if(isset($_SESSION['usuario'])) {
    require 'contenidoMostrar.php';
}
else {
    header('Location: login.php');
}




require 'contenidoMostrar.php';





?>