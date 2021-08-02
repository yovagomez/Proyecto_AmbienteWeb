<?php
     if(isset($_POST['btnNuevaFactura'])) 
     {
         include 'conexion.php';
         $AbiertaDB = AbrirDB();
     
         $cedula = $_POST['txtCedula'];
         $idAgente = $_POST['cboIdAgente'];
         $idVehiculo = $_POST['cboIdVehiculo'];
         $fechaEntrega = $_POST['txtFechaEntrega'];
         $total = $_POST['txtTotal'];
         $descripcion = $_POST['txtDescripcion'];
         $queryNewFactura = "CALL nuevaFactura('$cedula','$idAgente',$idVehiculo,'$fechaEntrega',$total,'$descripcion')";
         if($AbiertaDB -> query($queryNewFactura)){
             header("Location: menu.php");
         
         }else{
             echo $AbiertaDB -> error;
         }
                
         CerrarDB($AbiertaDB);
 
     }
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
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
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
                            <a class="dropdown-item" href="nuevaFactura.php">Crear Factura</a>
                            <a class="dropdown-item" href="salir.php">Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Cédula Cliente</h5>
                        </label>
                        <input type="text" class="form-control" id="txtCedula" name="txtCedula"
                            placeholder="Ingrese cedula">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">ID Agente
                            </h5>
                        </label>
                        <select id="cboIdAgente" name="cboIdAgente" class="form-control">
                            <option value="0">Seleccione ID agente</option>
                            <option value="1">201540215</option>
                            <option value="2">2564996</option>
                            <option value="3">2123456</option>
                            <option value="4">102250255</option>
                            <option value="5">108700964</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Código Vehículo
                            </h5>
                        </label>
                        <select id="cboIdVehiculo" name="cboIdVehiculo" class="form-control">
                            <option value="0">Seleccione código del vehículo</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
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

</body>