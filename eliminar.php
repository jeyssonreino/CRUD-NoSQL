<?php

$nombre = $_POST['nombre'];

// Borrar
require 'vendor/autoload.php'; //Composer
$cliente = new MongoDB\Client("mongodb://localhost:27017");//puerto
$coleccion = $cliente->unicor->personas;//BD y coleccion
$resultado = $coleccion->deleteOne(['nombre'=>$nombre]);

echo "Documento borrado...";


?>