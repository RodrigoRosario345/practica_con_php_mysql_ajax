<?php

// if (file_exists('documento.txt')){
//     echo 'el archivo existe';
// }else {
//     echo 'el archivo no existe';
// }

// echo file_get_contents('documento.txt');//muestra el contenido del archivo

// file_put_contents('documento.txt', 'Hola mundo');//sobreescribe el archivo

// file_put_contents('documento.txt', "Hola mundo \n ", FILE_APPEND);//añade al final del archivo


// $conteo = 0;


// contador de visitas opcion1 
$cuenta = file('documento.txt')[0]+1;//obtenemos el contenido del archivo y lo guardamos en la variable $cuenta y le sumamos 1
file_put_contents('documento.txt', $cuenta);//sobreescribimos el archivo con el nuevo valor
echo "<center>";
echo "<h1 style='color: blue'>Contador de visitas</h1>";
echo "<div style='color: #fff; padding-top: 15px; border-radius: 10px; background-color: green; height: 150px; width: 150px'><h2>$cuenta</h2><h3>Visitas</h3></div>";
echo "</center>";



// contador de visitas opcion2

// $cuenta = file_get_contents('documento.txt')+1;//obtenemos el contenido del archivo
// file_put_contents('documento.txt', $cuenta);//sobreescribimos el archivo con el nuevo valor

// echo "<center>";
// echo "<h1 style='color: blue'>Contador de visitas</h1>";
// echo "<div style='color: #fff; padding-top: 15px; border-radius: 10px; background-color: red; height: 150px; width: 150px'><h2>$cuenta</h2><h3>Visitas</h3></div>";
// echo "</center>";



?>