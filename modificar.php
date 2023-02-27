<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Modificar</title>
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">CRUD</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="insertar.html">Insertar <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="eliminar.html">Eliminar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listar.php">Mostrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="modificar.php">Actualizar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paginar.php">Paginar</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="col-12" style="margin: 20px 0px 0px 20px;">
        <form action="#" method="post">
            <div class="form-group row">
                <label for="id" class="col-1 col-form-label">ID</label>
                <div class="col-3">
                    <input id="id" name="id" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-1 col-1">
                    <button name="submit" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</body>

<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    require 'vendor/autoload.php'; //Composer
    $cliente = new MongoDB\Client("mongodb://localhost:27017"); //puerto
    $coleccion = $cliente->unicor->personas; //BD y coleccion
    $resultado = $coleccion->find(['id'=>$id]);
    $can = $coleccion->count(['id'=>$id]);;



    if ($can == 1) {
        foreach ($resultado as $datos){
            echo "<div class='col-12' style='margin: 20px 0px 0px 20px;'>";
            echo "<form action='actualizar.php' method='POST'>";
            echo "<input id='id' name='id' type='hidden' required='required' class='form-control col-3' value=" . $datos["id"] . "><br>";
            echo "<input id='nombre' name='nombre' type='text' required='required' class='form-control col-3' value=" . $datos["nombre"] . "><br>";
            echo "<input id='apellido' name='apellido' type='text' required='required' class='form-control col-3' value=" . $datos["apellido"] . "><br>";
            echo "<input id='telefono' name='telefono' type='text' required='required' class='form-control col-3' value=" . $datos["telefono"] . "><br>";
            echo "<input type='submit' value='Actualizar' class='btn btn-warning'>
            </form>";
            echo "</div>";
        }
    } else {
        echo "<div class='col-12' style='margin: 20px 0px 0px 20px;'>";
        echo "No registro con ID: " . $id . " No existe";
        echo "</div>";
    }
    

}

?>