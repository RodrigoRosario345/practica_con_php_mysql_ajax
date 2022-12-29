<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_prueba_conexion');

if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_error);//die es una función que detiene la ejecución del script y muestra el mensaje que le pasemos como parámetro.
}
else {
    $id  = isset($_GET['id']) ? $_GET['id'] : 1;
    $sql = "SELECT * FROM usuarios WHERE ID = $id"; // LIMIT PERMITE DEVOLVER UN NUMERO LIMITADO DE FILAS
    $resultado = $conexion->query($sql);// query() es un método de la clase mysqli que ejecuta una consulta SQL y devuelve un objeto mysqli_result.
    if ($resultado->num_rows > 0) {
        // echo "recorrido con while <br>";
        // while ($fila = $resultado->fetch_assoc()) { // mientras haya resultado o devuelva filas se ejecuta caso contrario devolvera null y automaticamente se sale del bucle while fetch_assoc() es un método de la clase mysqli_result que devuelve un array asociativo con los nombres de las columnas como índices. y ademas recorre una fila automaticamente sin la necesidad ir aumentando el indice.
        //     echo "Nombre: " . $fila['Nombre'] . " - Apellido: " . $fila['Apellido'] . " - Edad: " . $fila['Edad'] . "<br>";
        // }
        echo "<th>-------------------------</th> <br>";
        echo "recorrido con for <br>";
        for ($i=0; $i < $resultado->num_rows; $i++) { 
            $fila = $resultado->fetch_assoc();
            echo "Nombre: " . $fila['Nombre'] . " - Apellido: " . $fila['Apellido'] . " - Edad: " . $fila['Edad'] . "<br>";
        }
    }
    else {
        echo "No hay resultados";
    }
}

?>