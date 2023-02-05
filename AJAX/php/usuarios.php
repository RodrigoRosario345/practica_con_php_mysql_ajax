<?php


header ("Content-type: application/json; charset=utf-8");//tipo de contenido que se va a devolver al cliente

$respuesta = [
    [
        "id" => "1",
        "nombre" => "Perez",
        "edad" => 25,
        "pais" => "brazil",
        "correo" => "juan@gmail.com"

    ],
    [
        "id" => "2",
        "nombre" => "Gomez",
        "edad" => 30,
        "pais" => "chile",
        "correo" => "juan@gmail.com"
    ],
    [
        "id" => "3",
        "nombre" => "Gonzalez",
        "edad" => 35,
        "pais" => "Argentina",
        "correo" => "pedro@gmail.com"
    ],
    [
        "id" => "4",
        "nombre" => "Lopez",
        "edad" => 40,
        "pais" => "bolivia",
        "correo" => "jose@gmail.com"
    ],
    [
        "id" => "5",
        "nombre" => "Martinez",
        "edad" => 45,
        "pais" => "mexico",
        "correo" => "ana@gmail.com"
    ]
];

echo json_encode($respuesta);//devuelve la respuesta en formato json














?>