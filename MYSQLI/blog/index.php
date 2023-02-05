<?php

require 'admin/config.php';

require 'functions.php';


$conexion = conexion($bd_config);

if (!$conexion) {// si no hay conexion me redirecciona a error.php
    header('Location: error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);


// print_r($posts);
// //$sposts no necesita ser recorrido con 2 foreach porque ya esta recorrido en la funcion obtener_post, ya que fetchAll() devuelve un array con todos los resultados de la consulta este itera sobre el array y devuelve cada uno de los resultados de la consulta
// // fetchAll()

// $lista = array(array ("fecha", "estadocivil" => "casado", "nombre" => "francisco"), array ("fecha" => "10/08/2011", "estadocivil" => "soltero", "nombre" => "francisco"), array ("fecha" => "10/08/2011", "estadocivil" => "divorciado", "nombre" => "francisco"));

// echo $lista[0]["estadocivil"];

if(!$posts){
    header('Location: error.php');
}

require 'views/index.view.php';






?>