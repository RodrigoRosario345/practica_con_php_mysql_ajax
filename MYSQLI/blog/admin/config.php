<?php

define ('RUTA', 'http://localhost/practica_con_php_mysql_ajax/MYSQLI/blog/');

$bd_config = array(
    'basedatos' => 'bd_blog',
    'usuario' => 'root',
    'pass' => ''
);

$blog_config = array(
    'post_por_pagina' => '2', // 2 posts por pagina los posts son 
    'carpeta_imagenes' => 'imagenes/'
);


$blog_admin = array(
    'usuario' => 'admin',
    'password' => '123'
);


?>