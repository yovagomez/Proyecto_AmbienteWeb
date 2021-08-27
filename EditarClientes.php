<?php


$idCliente = $_GET['q'];

include 'conexion.php';
$bdAbierta = AbrirDB();

if(isset($_POST['btnEliminar'])){
    $queryDropCliente = "CALL EliminarCliente('$idCliente')";
    $bdAbierta -> query($queryDropCliente);
    header("Location: clientes.php");
    
}

if(isset($_POST['btnActualizar'])){
    $id = $_POST["txtid"];
    $idUsuario = $_POST["txtIdUsuario"];
    $nombre = $_POST["txtNombre"];
    $apellido1 = $_POST["txtApellido1"];
    $apellido2 = $_POST["txtApellido2"];
    $correo = $_POST["txtCorreo"];
    $clave = $_POST["txtClave"];

    $queryUpdateClientes = "CALL ActualizarClientes($id,'$idUsuario','$nombre','$apellido1','$apellido2','$correo','$clave')";
    $respuestaUpdateClientes = $bdAbierta -> query($queryUpdateClientes);
    header("Location: clientes.php");
}

$querryClientes = "CALL ConsultarClientes($idCliente)";
$respuestaCliente = $bdAbierta -> query($querryClientes);
$ClienteEncontrado = mysqli_fetch_array($respuestaCliente);

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
    <link rel="stylesheet" href="templates/style.css">
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
                        <a class="dropdown-item" href="factura.php">Facturas</a>
                        <a class="dropdown-item" href="tiquete.php">Tiquetes</a>
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

    <div class="container" style="overflow: scroll;">
        <div class="panel panel-info">
            <div class="panel-heading" style="text-align: center;">
                <br /><br /><br />
                <b style="font-size: 300%;">Actualización de Clientes</b>
                <br /><br /><br />
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">ID Cliente
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtid" name="txtid" readonly
                            value="<?php echo $ClienteEncontrado['id']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">Cédula Cliente
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtIdUsuario" name="txtIdUsuario"
                            placeholder="Ingrese la cédula del cliente"
                            value="<?php echo $ClienteEncontrado['idUsuario']; ?> ">

                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">Nombre
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                            placeholder="Ingrese el nombre" value="<?php echo $ClienteEncontrado['nombre']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">1er Apellido
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtApellido1'" name="'txtApellido1'"
                            placeholder="Ingrese el primer apellido" value="<?php echo $ClienteEncontrado['apellido1']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">2edo Apellido
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtApellido2'" name="'txtApellido2'"
                            placeholder="Ingrese el segundo apellido" value="<?php echo $ClienteEncontrado['apellido2']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">Correo
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtCorreo'" name="'txtCorreo'"
                            placeholder="Ingrese el primer apellido" value="<?php echo $ClienteEncontrado['correo']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif">Clave
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtClave'" name="'txtClave'"
                            placeholder="Ingrese la clave" value="<?php echo $ClienteEncontrado['clave']; ?> ">
                    </div>

                    <br />
                    <input type="submit" id="btnActualizar" name="btnActualizar" class="btn btn-success"
                        value="Actualizar" style="width:100%">
                    <br /><br />
                    <input type="submit" id="btnEliminar" name="btnEliminar" class="btn btn-danger" value="Eliminar"
                        style="width:100%">


                </form>
            </div>
        </div>
        <br /><br /><br /><br />
    </div>

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