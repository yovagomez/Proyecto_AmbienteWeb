<?php


$idEvento = $_GET['q'];

include 'conexion.php';
$AbiertaDB = AbrirDB();


if(isset($_POST['btnEliminar']))
{
    $queryDropEvento = "CALL EliminarEvento('$idEvento')";
    $AbiertaDB -> query($queryDropEvento);
    header("Location: eventos.php");
}

if(isset($_POST['btnActualizar']))
{
    $idEvento = $_POST["txtidEvento"];
    $descripcion = $_POST["txtDescripcion"];
    $lugar = $_POST["txtLugar"];
    $fecha = $_POST["txtFecha"];

    $queryActualizar = "CALL ActualizarEventos($idEvento,'$descripcion','$lugar','$fecha')";
    if($respuestaActualizar=$AbiertaDB -> query($queryActualizar))
    {
        header("Location: eventos.php");
    }else{
        echo $AbiertaDB -> error;
    }


}

$queryEventos = "CALL ConsultarEventos('$idEvento')";
$respuestaEventos = $AbiertaDB -> query($queryEventos);
$AbiertaDB -> next_result();

$EventoEncontrado = mysqli_fetch_array($respuestaEventos);

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
    <link rel="stylesheet" href="templates/style.css">
    <script src="https://kit.fontawesome.com/b5379856aa.js" crossorigin="anonymous"></script>
    <title>Menu FLIP-CARS</title>
</head>

<body style="background:#525252;">
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
                        Gesti??n Vehiculos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="VehiculosAlquiler.php">Vehiculos Alquiler</a>
                        <a class="dropdown-item" href="VehiculosVenta.php">Vehiculos Venta</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gesti??n de Personal
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="emple.php">Empleados</a>
                        <a class="dropdown-item" href="a??dEmp.php">A??adir Empleado</a>
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
                <b style="color: white;font-size: 300%;">Actualizaci??n de Eventos</b>
                <br /><br /><br />
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;color: white;">ID Evento
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtidEvento" name="txtidEvento" readonly
                            value="<?php echo $EventoEncontrado['idEvento']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;color: white;">Detalle
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"
                            placeholder="Ingrese una descripci??n"
                            value="<?php echo $EventoEncontrado['descripcion']; ?> ">

                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;color: white;">Lugar
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtLugar" name="txtLugar"
                            placeholder="Ingrese el lugar" value="<?php echo $EventoEncontrado['lugar']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;color: white;">Fecha
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtFecha'" name="'txtFecha'"
                            placeholder="Ingrese la fecha" value="<?php echo $EventoEncontrado['fecha']; ?> ">
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