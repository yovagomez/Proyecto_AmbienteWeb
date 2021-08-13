<?php

session_start();
$cedula = $_GET['q'];

include 'conexion.php';
$bdAbierta = AbrirDB();


if(isset($_POST['btnEliminar']))
{
    $queryEliminar = "CALL EliminarEmpleado('$cedula')";
    $bdAbierta -> query($queryEliminar);
    header("Location: emple.php");
}

if(isset($_POST['btnActualizar']))
{
    $cedula = $_POST['txtCedula'];
    $nombre = $_POST['txtNombre'];
    $apellidoP = $_POST['txtApellido1'];
    $apellidoS = $_POST['txtApellido2'];
    $correo = $_POST['txtCorreo'];
    $telefono = $_POST['txtTel'];
    $contraseña = $_POST['txtContraseña'];
    $queryActualizar = "CALL ActualizarEmpleado('$cedula','$nombre','$apellidoP','$apellidoS','$correo','$telefono','$contraseña)";

    if($bdAbierta -> query($queryActualizar))
    {
        EnviarCorreo($correo,'Su información se ha actualizado en nuestra base de datos','Notificación de Datos');        
    }
}

$queryUsuario = "CALL ConsultarAgente('$cedula')";
$respuestaUsuario = $bdAbierta -> query($queryUsuario);
$bdAbierta -> next_result();

$usuarioEncontrado = mysqli_fetch_array($respuestaUsuario);

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
                <h3>Gestion de Empleado</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Cedula</h5>
                        </label>
                        <input type="text" class="form-control" id="txtCedula" name="txtCedula"
                            placeholder="Ingrese el numero de identificación">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Nombre
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                            placeholder="Ingrese el nombre">

                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Primer Apellido
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtApellido1" name="txtApellido1"
                            placeholder="Ingrese el primer apellido">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Segundo Apellido
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="'txtApellido2'" name="'txtApellido2'"
                            placeholder="Ingrese el segundo apellido">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Correo
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtCorreo" name="txtCorreo"
                            placeholder="Ingrese el correo">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Teléfono
                            </h5>
                        </label>
                        <input type="text" class="form-control" id="txtTel" name="txtTel"
                            placeholder="Ingrese el numero de teléfono">
                    </div>
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Fecha Nacimiento
                            </h5>
                        </label>
                        <input type="date" class="form-control" id="txtFechaNaci" name="txtFechaNaci"
                            placeholder="Ingrese fecha de nacimiento">
                    </div>
                    <div class="col-sm-14">
                        <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Rol</h5>

                        <select id="cboPerfil" name="cboPerfil" class="form-control">
                            <option value="0">Seleccione el rol</option>
                            <option value="1">Gerente</option>
                            <option value="2">Administrador</option>
                            <option value="3">Agente</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Contraseña
                            </h5>
                        </label>
                        <input type="password" class="form-control" id="txtContraseña" name="txtContraseña"
                            placeholder="Ingrese su contraseña">
                    </div>
                    <br />
                    <div class="col text-center">
                        <input type="submit" class="btn btn" value="Ingresar" name="btnRegistrar"
                            style="background-color: #bdbcb9; color: black;"></input>
                        <br /><br />
                    </div>
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