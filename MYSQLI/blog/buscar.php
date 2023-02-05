<?php
require 'admin/config.php';
require 'functions.php';


$conexion = conexion($bd_config);

if (!$conexion) {// si no hay conexion me redirecciona a error.php
    header('Location: error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){// si el metodo de envio es get y la variable busqueda no esta vacia
    $busqueda = limpiarDatos($_GET['busqueda']);
    $statement = $conexion->prepare(
        'SELECT * FROM articulos WHERE titulo LIKE :busqueda OR texto LIKE :busqueda'// busqueda por titulo o texto
    );
    $statement->execute(array(':busqueda' => "%$busqueda%"));// %$busqueda% es para que busque en cualquier parte del titulo o texto
    $resultados = $statement->fetchAll();// guadamos el resultado fetchAll() devuelve un array con todos los resultados de la consulta este itera sobre el array y devuelve cada uno de los resultados de la consulta
    if(empty($resultados)){
        $titulo = 'No se encontraron articulos con el resultado: ' . $busqueda;
    }else{
        $titulo = 'Resultados de la busqueda: ' . $busqueda;
    }

}else{
    header('Location: ' . RUTA . '/index.php');
}

require 'views/buscar.view.php';


?>