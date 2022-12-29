<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_articulos');

if($conexion->connect_errno){
    die("Error de conexión: " . $conexion->connect_error);
}











?>