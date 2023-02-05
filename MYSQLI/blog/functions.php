<?php


function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);//
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
} 

function limpiarDatos($datos){
    $datos = trim($datos);// nos elimina los espacios en blanco de los datos de inicio y final
    $datos = stripslashes($datos); // nos elimina las barras invertidas
    $datos = htmlspecialchars($datos); // nos convierte los caracteres especiales en entidades html
    return $datos;
}

function pagina_actual(){// funcion para saber en que pagina estoy
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;//isset es para saber si la variable esta definida y si esta definida me devuelve el valor de la variable si no me devuelve 1
}

function obtener_post($post_por_pagina, $conexion ){// post por pagina es la cantidad de post que quiero mostrar por pagina es decir 2 post por pagina post es los articulos que quiero mostrar
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");// SQL_CALC_FOUND_ROWS es para saber cuantos articulos hay en la base de datos 
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function numero_paginas($post_por_pagina, $conexion){
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');// FOUND_ROWS() es para saber cuantos articulos hay en la base de datos
    $total_post->execute();// ejecutamos la consulta
    $total_post = $total_post->fetch()['total'];// obtenemos el total de articulos que hay en la base de datos
    $numero_paginas = ceil($total_post / $post_por_pagina);// ceil es para redondear un numero hacia arriba 
    return $numero_paginas; // me devuelve el numero de paginas que hay
}

function id_articulo($id){// funcion para saber el id del articulo
    return (int)limpiarDatos($id);// limpiamos los datos y los convertimos en entero
}

function obtener_post_por_id($conexion, $id){// funcion para obtener el post por id
    $resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");// query es para ejecutar una consulta
    $resultado = $resultado->fetchAll();// fetchAll() es para obtener todos los resultados de la consulta
    return ($resultado) ? $resultado : false;// si hay resultado me devuelve el resultado si no me devuelve false
}

function fecha($fecha){// funcion para formatear la fecha
    $timestamp = strtotime($fecha);// strtotime es para convertir una cadena de texto a una fecha
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $dia = date('d', $timestamp);// date es para formatear la fecha d m y Y obtenemos el dia mes y año
    $mes = date('m', $timestamp) - 1;// date es para formatear la fecha
    $year = date('Y', $timestamp);// date es para formatear la fecha
    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha;
}

function comprobarSession(){
    if(!isset($_SESSION['admin'])){// si no esta definida la variable admin me redirecciona a login.php con el fin de que inicie sesion
        header('Location: ' . RUTA);
    }
}


?>