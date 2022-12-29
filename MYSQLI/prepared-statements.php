<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_prueba_conexion');

if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_error);//die es una función que detiene la ejecución del script y muestra el mensaje que le pasemos como parámetro.
}
else {
    $sql = "SELECT * FROM usuarios"; // LIMIT PERMITE DEVOLVER UN NUMERO LIMITADO DE FILAS

    $datos = $conexion->query($sql);// query() es un método de la clase mysqli que ejecuta una consulta SQL y devuelve un objeto mysqli_result.

    $statement = $conexion->prepare("INSERT INTO usuarios (Nombre, Apellido, Edad) VALUES (?, ?, ?)");

    $statement->bind_param("ssi", $nombre, $apellido, $edad);

    $ejecucion = "no";

    $existe = "no";

    $conteo = 1;

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad'])) {
        for ($i=0; $i < $datos->num_rows; $i++) { 
            $fila = $datos->fetch_assoc();
            
            if ($fila['Nombre'] == $_POST['nombre'] && $fila['Apellido'] == $_POST['apellido'] && $fila['Edad'] == $_POST['edad']) {
                echo "El usuario ya existe"."<br><br>";
                $existe = 'si';
                $conteo = 0;
                break;
                
            }
            else {
                while($conteo == 1){
                    if($existe == "no") {
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $edad = $_POST['edad'];
                        $ejecucion = "insertar";
                        
                    }
                    $conteo = 0;
    
                }
            }
            
        
        }
    }
    else {
        echo "No se han enviado datos";
    }

    if ($ejecucion == "insertar") {
        $statement->execute();
        echo "Se ha insertado correctamente"."<br><br>";
    }
    else {
        echo "No se ha insertado porque el usuario ya existe". "<br><br>";
        echo "<a href='formulario.php'>Volver a registrarse</a>"."<br><br>";
    }


    

    if($conexion->affected_rows > 0) {
        echo "Se han insertado " . $conexion->affected_rows . " filas";
    }
    else {
        echo "No se han insertado filas";
    }
}











?>