<?php
require 'funciones.php';

$conexion = conexion('bd_galeria', 'root', '');

if (!$conexion) {
    die('Error de conexión');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){ //$_SERVER['REQUEST_METHOD'] es una variable superglobal que devuelve el método de la petición. $_FILES es una variable superglobal que devuelve un array con los archivos que se suben al servidor. Si no se sube ningún archivo, $_FILES estará vacío.
    $file_temporal = $_FILES['foto']['tmp_name']; //$_FILES['foto']['tmp_name'] es el nombre temporal del archivo que se sube.
    $check = @getimagesize($file_temporal); //$_FILES['foto']['tmp_name'] es el nombre temporal del archivo que se sube. @getimagesize() es una función que devuelve el tamaño de una imagen y el tipo de imagen. Si el archivo no es una imagen, getimagesize() devolverá false.
    if($check !== false){
        $carpeta_destino = 'imgSave/'; //carpeta donde se guardaran las fotos.
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];//$_FILES['foto']['name'] es el nombre del archivo que se sube. 
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);//move_uploaded_file() es una función que mueve un archivo subido a una nueva ubicación. Si el archivo se sube correctamente, move_uploaded_file() devolverá true. Si no se sube correctamente, devolverá false.
        $statement = $conexion->prepare('INSERT INTO fotos (titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)'); //prepare() es un método de la clase mysqli que prepara una sentencia SQL para su ejecución. Devuelve un objeto mysqli_stmt.
        $statement->execute(array(
            ':titulo' => $_POST['titulo'],
            ':imagen' => $_FILES['foto']['name'],
            ':texto' => $_POST['texto']
        ));
        header('Location: index.php');
    }
    else {
        $error = "El archivo no es una imagen o el archivo es muy pesado";
    }
}


require 'views/subir.view.php';




?>