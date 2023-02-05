<?php

function conexion($bd_galeria, $usuario, $pass){

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=$bd_galeria", $usuario, $pass);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }

}




?>