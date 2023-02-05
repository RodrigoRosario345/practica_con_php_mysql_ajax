<?php

session_start();//iniciamos la sesion para poder usarla 

require 'config.php';

require '../functions.php';

comprobarSession();//comprobamos si el usuario esta logueado

$conexion = conexion($bd_config);//conectamos con la base de datos

if (!$conexion) {//si no hay conexion me redirecciona a error.php
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $titulo = limpiarDatos($_POST['titulo']);//limpiamos los datos que nos llegan por el metodo post
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $id = limpiarDatos($_POST['id']);//valor hiden que nos llega por el metodo post
    $thumb_guardada = $_POST['thumb-guardada'];//obtenemos el nombre de la imagen que ya tenia el articulo
    $thumb = $_FILES['thumb'];//obtenemos el nombre de la imagen que nos llega por el metodo post

    if (empty($thumb)) {//si el nombre de la imagen esta vacio le asignamos el nombre de la imagen que ya tenia el articulo
        $thumb = $thumb_guardada;
    }else{
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];//si el nombre de la imagen no esta vacio le asignamos el nombre de la imagen que nos llega por el metodo post
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);//mueve el archivo de la carpeta temporal a la carpeta que le indiquemos
        $thumb = $_FILES['thumb']['name'];//le asignamos el nombre de la imagen que nos llega por el metodo post
    }

    $statement = $conexion->prepare(//preparamos la consulta
        'UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id'//sin espacio despues de VALUES
    );

    $statement->execute(array(//ejecutamos la consulta
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    header('Location: ' . RUTA . '/admin');//me redirecciona a index.php

}
else{

    $id_articulo = id_articulo($_GET['id']);//obtenemos el id del articulo

    if (empty($id_articulo)) {//si el id esta vacio me redirecciona a index.php
        header('Location: ' . RUTA . '/admin');
    }

    $post = obtener_post_por_id($conexion, $id_articulo);//obtenemos el post por el id ES DECIR EL POST QUE QUEREMOS EDITAR LA INFORMACION

    if (!$post) {//si no hay post me redirecciona a index.php
        header('Location: ' . RUTA . '/admin');
    }

    $post = $post[0];//como el resultado de la consulta es un array de arrays y solo necesito el array de la posicion 0 le asigno el valor de la posicion 0 a la variable post
     
}



require '../views/editar.view.php'


?>