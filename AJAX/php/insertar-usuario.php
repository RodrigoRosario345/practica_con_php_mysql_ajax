<?php


error_reporting(0);//para que no muestre los errores (solo para desarrollo

header ("Content-type: application/json; charset=utf-8");//tipo de contenido que se va a devolver al cliente

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$pais = $_POST["pais"];
$correo = $_POST["correo"];

function validarDatos($nombre, $edad, $pais, $correo){
    if ($nombre == "" ) {//si el nombre esta vacio
        return false;
    }else if ($edad == "" && is_int($edad)) {//si la edad esta vacia y no es un numero entero
        return false;
    }else if ($pais == "") {//si el pais esta vacio
        return false;
    }else if ($correo == "") {//   si el correo esta vacio
        return false;
    }
    return true;//si todo esta bien
}

if(validarDatos($nombre, $edad, $pais, $correr)){
    $conexion = new mysqli("localhost", "root", "", "bd_curso_php_ajax");
    $conexion->set_charset("utf8");//para que se muestren los caracteres especiales
    if ($conexion->connect_errno) {
        $respuesta = [
            "error" => true
        ];
    }else{
        $stetment = $conexion->prepare("INSERT INTO usuarios (nombre, edad, pais, correo) VALUES (?,?,?,?)");
        $stetment->bind_param("siss", $nombre, $edad, $pais, $correo);//s = string, i = int, d = double, b = blob
        $stetment->execute();//ejecuta la consulta
        
        $if ($conexion->affected_rows <= 0) {// affected_rows devuelve el numero de filas afectadas por la ultima consulta
            $respuesta = [
                "error" => true,
            ];
    }
}
else {
    $respuesta = [
        "error" => true,
    ];
}

$respuesta = [];    

echo json_encode($respuesta);

?>