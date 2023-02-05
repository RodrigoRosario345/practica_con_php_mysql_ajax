<?php
session_start();

require 'admin/config.php';

require 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    if($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']){
        $_SESSION['admin'] = $blog_admin['usuario'];// creamos una sesion llamada admin y le asignamos el valor del usuario esto es para saber si el usuario esta logueado
        header('Location: ' . RUTA . 'admin');
    }
}



require 'views/login.view.php';
?>