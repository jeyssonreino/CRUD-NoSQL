<?php 
$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$tel = $_POST['telefono'];

//Isertar
require 'vendor/autoload.php'; //Composer
$cliente = new MongoDB\Client("mongodb://localhost:27017");//puerto
$coleccion = $cliente->unicor->personas;//BD y coleccion
$resultado = $coleccion->insertOne([ 'nombre' => $nom , 'apellido' => $ape, 'telefono' => $tel ]);

echo "Insertado registro '{$resultado->getInsertedId()}'";
