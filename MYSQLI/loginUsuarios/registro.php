<?php

session_start();

if(isset($_SESSION['usuario'])) { // $_SESSION es una variable superglobal que nos permite acceder a las variables de sesión, en este caso si existe la variable de sesión usuario, redirigimos a contenidoMostrar.php
    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {// $_SERVER['REQUEST_METHOD'] es una variable superglobal que nos permite saber si el usuario esta enviando datos por el metodo POST o GET
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);// filter_var() es una función que nos permite filtrar datos, en este caso el nombre de usuario, y strtolower() es una función que nos permite convertir el nombre de usuario a minúsculas.y filter_SANITIZE_STRING es una constante que nos permite filtrar el nombre de usuario para que no tenga caracteres especiales.
    $contraseña = $_POST['contraseña'];
    $Rcontraseña = $_POST['Rcontraseña'];

    $errores = '';

    if(empty($usuario) or empty($contraseña) or empty($Rcontraseña)){
        $errores .=  '<li>Por favor rellena todos los datos correctamente</li>';
    }
    else {
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=bd_login', 'root', '');// PDO es una clase que nos permite conectarnos a la base de datos
            
            
        } catch (Exception $e) {// exception es una clase que nos permite manejar errores $e es una variable que nos permite acceder a la clase exception
            echo "Error: " . $e->getMessage();
        }

        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");// :usuario es un marcador de posición que nos permite pasarle el nombre de usuario a la consulta

        $statement->execute(array(':usuario' => $usuario));//array es una función que nos permite crear un arreglo con los datos que le pasemos como parámetro
            
        $resultado = $statement->fetch();// fetch es un método de la clase PDOStatement que nos permite obtener el resultado de la consulta

        if($resultado != false) {
            $errores .= '<li>El usuario ya existe !porfavor escriba otro usuario!</li>';
        }

        $contraseña = hash('sha512', $contraseña);// hash es una función que nos permite encriptar la contraseña

        $Rcontraseña = hash('sha512', $Rcontraseña);

        if($contraseña != $Rcontraseña) {
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }
    }

    if($errores == '') {
        $statement = $conexion->prepare("INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)");// null es un valor que se le pasa al id para que se autoincremente

        $statement->execute(array(':usuario' => $usuario, ':pass' => $contraseña));// metemos en un arreglo los datos que le pasaremos a la consulta para que no se puedan inyectar datos

        header('Location: login.php');
    }
}

require 'registroMostrar.php';


?>