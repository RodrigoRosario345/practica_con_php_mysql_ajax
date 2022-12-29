<?php

include 'conexion.php';

// $sql = "SELECT * FROM articulo LIMIT 5, 10";



$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$postPorPagina = 5;

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulo LIMIT $inicio, $postPorPagina");

$articulos->execute(); 

$articulos = $articulos->get_result();// get_result() es un método de la clase mysqli_stmt que devuelve un objeto mysqli_result.

$articulos = $articulos->fetch_all(MYSQLI_ASSOC); // fetch_all() es un método de la clase mysqli_result que devuelve un array asociativo con todas las filas de un conjunto de resultados.


if(!$articulos) {
    header('Location: index.php');
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total'); // FOUND_ROWS() es una función de MySQL que devuelve el número de filas devueltas por la última sentencia SELECT.
$totalArticulos = $totalArticulos->fetch_assoc()['total'];  // fetch() es un método de la clase mysqli_result que devuelve un array asociativo con la fila de un conjunto de resultados se usa [total] para acceder al valor de la columna total.



$numeroPaginas = ceil($totalArticulos / $postPorPagina);// ceil() es una función que redondea un número hacia arriba.




?>