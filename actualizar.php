<?php 

$id = $_POST['id'];
$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$tel = $_POST['telefono'];

require 'vendor/autoload.php'; //Composer
$cliente = new MongoDB\Client("mongodb://localhost:27017");//puerto
$coleccion = $cliente->unicor->personas;//BD y coleccion
$resultado = $coleccion->updateOne(['id'=>$id],['$set' =>['nombre'=> $nom,'apellido'=> $ape,'telefono'=> $tel]]);

echo "Cant. Registros modificados ".$resultado ->getMatchedCount();

?>


