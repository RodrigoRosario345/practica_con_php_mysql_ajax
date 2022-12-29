<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_prueba_conexion');

if ($conexion->connect_errno) {
    echo "Error al conectarse con MySQL debido al error " . $conexion->connect_error;
    exit();
}
else {
    echo "Conexión exitosa";
}

?>