<?php


pathinfo('documento.txt', PATHINFO_BASENAME); // Devuelve el nombre del documento "documento.txt"

pathinfo('/carpeta/documento.txt', PATHINFO_DIRNAME); // Devuelve el directorio "." de donde esta dentro nuestro archivo

pathinfo('/carpeta/documento.txt', PATHINFO_EXTENSION); // Devuelve la extensión del archivo "txt"

pathinfo('/carpeta/documento.txt', PATHINFO_FILENAME); // Devuelve el nombre del archivo sin la extensión "documento"

glob('*.php'); // Devuelve un array con todos los archivos que coincidan con la extensión ".php" sirve para buscar archivos

$resultado = glob('paginacion/*.{php,html,txt}', GLOB_BRACE); // Devuelve un array con todos los archivos que coincidan con la extensiones ".php", ".html" y ".txt"

print_r($resultado); // Imprime el array

for ($i=0; $i < count($resultado); $i++) { 
    echo $resultado[$i].'<br>';
}

basename('carpeta/documento.txt'); // Devuelve el nombre del documento "documento.txt" nos elimina los directorios que esten antes del nombre del archivo

dirname('carpeta/documento.txt'); // Devuelve el directorio "." de donde esta dentro nuestro archivo

?>