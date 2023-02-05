<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_prueba_conexion');

if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_error)//die es una función que detiene la ejecución del script y muestra el mensaje que le pasemos como parámetro.
}
else {
    echo "Conexión exitosa";
}

?>