<?php

session_start();

require 'config.php';

require '../functions.php';

$conexion = conexion($bd_config);

comprobarSession();


if (!$conexion) {
    header('Location: ../error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);// $blog_config['post_por_pagina'] es el numero de post por pagina


require '../views/admin_index.view.php';




?>