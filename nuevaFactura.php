<?php

include 'conexion.php';
$AbiertaDB = AbrirDB();
     if(isset($_POST['btnNuevaFactura'])) 
     {
     
         $cedula = $_POST['txtCedulaCliente'];
         $idAgente = $_POST['cboIdAgente'];
         $idVehiculo = $_POST['cboIdVehiculo'];
         $fechaEntrega = $_POST['txtFechaEntrega'];
         $total = $_POST['txtTotal'];
         $descripcion = $_POST['txtDescripcion'];
         $queryNewFactura = "CALL nuevaFactura($cedula,$idAgente,$idVehiculo,'$fechaEntrega',$total,'$descripcion')";
         if($AbiertaDB -> query($queryNewFactura)){
             header("Location: menu.php");
         
         }else{
             echo $AbiertaDB -> error;
         }
                
         
 
     }
     $queryConsultarUsuarios = "CALL consultarUsuarios('-1')";
     $respuestaUsuarios = $AbiertaDB -> query($queryConsultarUsuarios);
     $AbiertaDB ->next_result();
     $queryConsultarAgentes = "CALL consultarAgentes('-1') ";
     $respuestaAgentes = $AbiertaDB -> query($queryConsultarAgentes);
     $AbiertaDB ->next_result();
     $queryConsultarVV = "CALL ConsultarVV('-1') ";
     $respuestaVV = $AbiertaDB -> query($queryConsultarVV);
     $AbiertaDB ->next_result();
    

     CerrarDB($AbiertaDB);
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Crear Factura</title>
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

    <br /><br /><br /><br />
    <div class="container" style="overflow: scroll;">
        <div class="panel panel-info">
            <div class="panel-heading" style="text-align: center;">
                <h3>Nueva Factura</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Cedula Cliente
                            </h5>
                        </label>
                        <select id="txtCedulaCliente" name="txtCedulaCliente" class="form-control">
                            <option value="-1">Seleccione la cédula del cliente</option>
                            <?php
                                    while($fila = mysqli_fetch_array($respuestaUsuarios))
                                    {
                                        echo "<option value=" . $fila['id'] . ">" . $fila["idUsuario"] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">ID Agente
                            </h5>
                        </label>
                        <select id="cboIdAgente" name="cboIdAgente" class="form-control">
                            <option value="-1">Seleccione Agente</option>
                            <?php
                                    while($fila = mysqli_fetch_array($respuestaAgentes))
                                    {
                                        echo "<option value=" . $fila['id'] . ">" . $fila["nombre"] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Vehículo
                            </h5>
                        </label>
                        <select id="cboIdVehiculo" name="cboIdVehiculo" class="form-control">
                            <option value="-1">Seleccione el vehículo comprado</option>
                            <?php
                                    while($fila = mysqli_fetch_array($respuestaVV))
                                    {
                                        echo "<option value=" . $fila['idVehiculosVenta'] . ">" . $fila["marca"] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Fecha Entrega
                            </h5>
                        </label>
                        <input type="datetime-local" class="form-control" id="txtFechaEntrega" name="txtFechaEntrega"
                            placeholder="Ingrese la fecha de entrega">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Total
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtTotal" name="txtTotal"
                            placeholder="Digíte el monto total">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Descripción
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"
                            placeholder="Ingrese la descripción">
                    </div>
                    <br />
                    <div class="col text-center">
                        <input type="submit" class="btn btn" value="Crear" name="btnNuevaFactura"
                            style="background-color: #bdbcb9; color: black;"></input>
                        <br /><br />
                    </div>
                </form>
            </div>
        </div>
        <br /><br /><br /><br />

    </div>

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