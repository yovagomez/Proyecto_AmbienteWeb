<?php

session_start();
$idVehiculosVenta = $_GET['q'];

include 'conexion.php';
$bdAbierta = AbrirDB();


if(isset($_POST['btnEliminar']))
{
    $queryEliminar = "CALL EliminarVV('$idVehiculosVenta')";
    $bdAbierta -> query($queryEliminar);
    header("Location: VehiculosVenta.php");
}

if(isset($_POST['btnActualizar']))
{
    $idVehiculosVenta = $_POST['txtidVehiculosVenta'];
    $marca = $_POST['txtmarca'];
    $modelo = $_POST['txtmodelo'];
    $color = $_POST['txtcolor'];
    $anio = $_POST['txtanio'];
    $respaldo = $_POST['txtrespaldo'];
    $queryActualizar = "CALL ActualizarVehiculoV($idVehiculosVenta,'$marca','$modelo','$color',$anio,'$respaldo')";
    $respuestaActualizar=$bdAbierta -> query($queryActualizar);
    header("Location: VehiculosVenta.php");


}

$queryVehiculo = "CALL ConsultarVehiculoV('$idVehiculosVenta')";
$respuestaVehiculo = $bdAbierta -> query($queryVehiculo);
$bdAbierta -> next_result();

$VehiculoEncontrado = mysqli_fetch_array($respuestaVehiculo);

CerrarDB($bdAbierta);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
    <link href="templates\estilo.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b5379856aa.js" crossorigin="anonymous"></script>
    <title>Menu FLIP-CARS</title>
</head>

<body>
    <!-- Bloque de codigo del NavBar/Barra del Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar fixed-top">
        <a class="navbar-brand" href="menu.php">FLIP CARS S.A</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión Vehiculos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="VehiculosAlquiler.php">Vehiculos Alquiler</a>
                        <a class="dropdown-item" href="VehiculosVenta.php">Vehiculos Venta</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión de Personal
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="emple.php">Empleados</a>
                        <a class="dropdown-item" href="añdEmp.php">Añadir Empleado</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="nuevaFactura.php">Crear Factura</a>
                        <a class="dropdown-item" href="nuevoTiquete.php">Crear Tiquete</a>
                    </div>
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Geovanny<?php echo $_SESSION['NombreAgente']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="emple.php">Ajustes</a>
                            <a class="dropdown-item" href="salir.php">Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin del NavBar/Barra del Menu -->

    <!-- Espacio de Información -->
    <br /><br /><br /><br />
    <div class="container" style="overflow: scroll;">
        <div class="panel panel-info">
            <div class="panel-heading" style="text-align: center;">
                <h3>Actualización de Vehículo</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Id</h5>
                        </label>
                        <input type="text" class="form-control" id="txtidVehiculosVenta" name="txtidVehiculosVenta"
                            placeholder="Ingrese la identificación" readonly value="<?php echo $VehiculoEncontrado['idVehiculosVenta']; ?> "> 
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Marca
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtmarca" name="txtmarca"
                            placeholder="Ingrese el fabricante"value="<?php echo $VehiculoEncontrado['marca']; ?> ">

                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Modelo
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtmodelo" name="txtmodelo"
                            placeholder="Ingrese el modelo" value="<?php echo $VehiculoEncontrado['modelo']; ?> "> 
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Color
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtcolor'" name="'txtcolor'"
                            placeholder="Ingrese el color" value="<?php echo $VehiculoEncontrado['color']; ?> "> 
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Año
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtanio" name="txtanio"
                            placeholder="Ingrese el año de fabricación" value="<?php echo $VehiculoEncontrado['anio']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Respaldo
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtrespaldo" name="txtrespaldo"
                            placeholder="Ingrese el respaldo" value="<?php echo $VehiculoEncontrado['respaldo']; ?> ">
                    </div>
                    
                    <br />
                            <input type="submit" id="btnEliminar" name="btnEliminar" class="btn btn-danger" value="Eliminar" style="width:100%" >
                            <br /><br />
                            <input type="submit" id="btnActualizar" name="btnActualizar" class="btn btn-info" value="Actualizar" style="width:100%" >
                </form>
            </div>
        </div>
        <br /><br /><br /><br />
    </div>
    <!-- Fin Espacio de Información -->

    <!-- Propiedades necesarias para el correcto funcionamiento de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    $('.carousel').carousel();
    </script>
</body>

</html>