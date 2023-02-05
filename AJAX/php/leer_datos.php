<?php

error_reporting(0);//para que no muestre los errores (solo para desarrollo

header ("Content-type: application/json; charset=utf-8");//tipo de contenido que se va a devolver al cliente

$conexion = mysqli_connect("localhost", "root", "", "bd_curso_php_ajax");

if ($conexion->connect_errno) {
    $respuesta = [
        "error" => true
    ];
}else{
    $conexion->set_charset("utf8");//para que se muestren los caracteres especiales 
    $stetment = $conexion->prepare("SELECT * FROM usuarios");
    $stetment->execute();
    $resultado = $stetment->get_result();//get_result() devuelve un objeto de tipo mysqli_result que contiene los datos de la consulta

    $respuesta = [];

    while ($fila = $resultado->fetch_assoc()) {
        $usuario = [
            "id" => $fila["ID"],
            "nombre" => $fila["nombre"],
            "edad" => $fila["edad"],
            "pais" => $fila["pais"],
            "correo" => $fila["correo"]
        ];
        array_push($respuesta, $usuario);//agrega un elemento al final del array
    }

}

echo json_encode($respuesta);//devuelve la respuesta en formato json

?>