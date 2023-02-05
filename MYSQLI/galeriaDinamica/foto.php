<?php

require 'funciones.php';

$conexion = conexion('bd_galeria', 'root', '');

if(!$conexion) {
    die('Error de conexión');
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false; //isset determina si una variable está definida y no es NULL. (int) convierte a entero.

if(!$id) { //Si no hay id, redirige a index.php
    header('Location: index.php');
}

$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');  //Prepara la consulta 

$statement->execute(array(':id' => $id)); //Ejecuta la consulta
 
$foto = $statement->fetch(); //fetch() devuelve la siguiente fila de un conjunto de resultados asociado al objeto PDOStatement. fetch() devuelve un array que corresponde a la fila siguiente, o FALSE si no hay más filas.

if (!$foto) { //Si no hay foto, redirige a index.php
    header('Location: index.php');
}







require 'views/foto.view.php';




?>

