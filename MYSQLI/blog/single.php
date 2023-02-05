<?php

require 'admin/config.php';

require 'functions.php';

$conexion = conexion($bd_config);

$id_articulo = id_articulo($_GET['id']);

if(!$conexion){
    header('Location: error.php');
}

if(empty($id_articulo)){// si el id esta vacio me redirecciona a index.php empty es para saber si la variable esta vacia
    header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);

if(!$post){// si no hay post me redirecciona a index.php
    header('Location: index.php');
}

$post = $post[0];// como el resultado de la consulta es un array de arrays y solo necesito el array de la posicion 0 le asigno el valor de la posicion 0 a la variable post


require 'views/single.view.php';


?>