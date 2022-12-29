<?php 
session_start();//session_start() es una función que nos permite iniciar una sesión.

if(isset($_SESSION['usuario'])) { // Si existe la sesión usuario, redirigimos a contenidoMostrar.php
    header('Location: index.php');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);//filter_var() es una función que nos permite filtrar datos, en este caso el nombre de usuario, y strtolower() es una función que nos permite convertir el nombre de usuario a minúsculas.y filter_SANITIZE_STRING es una constante que nos permite filtrar el nombre de usuario para que no tenga caracteres especiales.
    $contraseña = $_POST['contraseña'];
    $contraseña = hash('sha512', $contraseña);// hash es una función que nos permite encriptar la contraseña

    try{
        $conexion = new PDO('mysql:host=localhost; dbname=bd_login', 'root', ''); 

    } catch (Exception $e) {// exception es una clase que nos permite manejar errores $e es una variable que nos permite acceder a la clase exception
        echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass');//prepare es un método de la clase PDO que nos permite preparar una consulta SQL y devuelve un objeto PDOStatement.
    $statement->execute(array(':usuario' => $usuario, ':pass' => $contraseña));//execute es un método de la clase PDOStatement que nos permite ejecutar una consulta SQL y devuelve un booleano.

    $resultado = $statement->fetch();//fetch es un método de la clase PDOStatement que nos permite obtener una fila de un conjunto de resultados asociado al objeto PDOStatement.

    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    }else{
        $errores .= '<li>Datos incorrectos</li>';
    }
}



require 'loginMostrar.php';












?>