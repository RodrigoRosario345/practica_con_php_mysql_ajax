<?php
session_start();

$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$edad = $_SESSION['edad'];

if (isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['edad'])) {
    echo "Nombre: ".$nombre."<br>";
    echo "Apellido: ".$apellido."<br>";
    echo "Edad: ".$edad."<br>";
}
else {
    echo "No se han recuperado los datos correctamente"."<br><br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="datos.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="nombre">
            <br><br>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="apellido">
            <br><br>    
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" placeholder="edad">
            <br><br>
            <input type="submit" value="Enviar">
        </form>
    </center>
</body>s
</html>