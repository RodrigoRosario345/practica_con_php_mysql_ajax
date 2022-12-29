<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_prueba_conexion');

$sql2 = "SELECT * FROM usuarios"; // LIMIT PERMITE DEVOLVER UN NUMERO LIMITADO DE FILAS

$resultado2 = $conexion->query($sql2);// query() es un método de la clase mysqli que ejecuta una consulta SQL y devuelve un objeto mysqli_result.

while ($fila = $resultado2->fetch_assoc()) { // mientras haya resultado o devuelva filas se ejecuta caso contrario devolvera null y automaticamente se sale del bucle while fetch_assoc() es un método de la clase mysqli_result que devuelve un array asociativo con los nombres de las columnas como índices. y ademas recorre una fila automaticamente sin la necesidad ir aumentando el indice.
    echo "Nombre: " . $fila['Nombre'] . " - Apellido: " . $fila['Apellido'] . " - Edad: " . $fila['Edad'] . "<br>";
}

$sql = "INSERT INTO usuarios (Nombre, Apellido, Edad) VALUES ('Carlos', 'Villagran Lopez', 20)";

$resultado = $conexion->query($sql);

if ($conexion->affected_rows > 0) {
    echo "Se ha insertado el registro correctamente";
    echo "filas insertadas: " . $conexion->affected_rows;
}
else {
    echo "No se ha insertado el registro";
}












?>