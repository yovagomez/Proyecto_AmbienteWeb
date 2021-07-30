<?php
    

    if(isset($_POST['btnRegistrar'])) 
    {
        include 'conexion.php';
        $AbiertaDB = AbrirDB();
    
        $cedula = $_POST['txtCedula'];
        $fechaNaci = $_POST['txtFechaNaci'];
        $nombre = $_POST['txtNombre'];
        $apellidoP = $_POST['txtApellido1'];
        $apellidoS = $_POST['txtApellido2'];
        $correo = $_POST['txtCorreo'];
        $telefono = $_POST['txtTel'];
        $rol = $_POST['cboPerfil'];
        $contraseña = $_POST['txtContraseña'];
        $queryRegistrar = "CALL RegistrarUsuario('$cedula','$fechaNaci','$nombre','$apellidoP','$apellidoS','$correo','$telefono','$rol','$contraseña')";
        $AbiertaDB -> query($queryRegistrar);
        header("Location: inicio.php");

        CerrarDB($AbiertaDB);

    }

  

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign in|FipCars</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="templates/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>
    <section id="pantalla_dividida">
        <div class="izquierda" style="text-align: center; overflow: scroll;">
            <br /><br />
            <div style="font-family: Georgia, 'Times New Roman', Times, serif">
                <h1>FLIP CARS</h1>
            </div>
            <div style="font-family: Georgia, 'Times New Roman', Times, serif; opacity: 0.5;">
                <p>Venta y Alquiler de Vehiculos</p>
            </div>
            <div class="main">
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Cédula</h5>
                                </label>
                                <input type="text" class="form-control" id="txtCedula" name="txtCedula"
                                    placeholder="Ingrese cedula">
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Fecha Nacimiento
                                    </h5>
                                </label>
                                <input type="date" class="form-control" id="txtFechaNaci" name="txtFechaNaci"
                                    placeholder="Ingrese fecha de nacimiento">
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Nombre
                                    </h5>
                                </label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                    placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Primer Apellido
                                    </h5>
                                </label>
                                <input type="text" class="form-control" id="txtApellido1" name="txtApellido1"
                                    placeholder="Ingrese su 1er apellido">
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Segundo Apellido
                                    </h5>
                                </label>
                                <input type="text" class="form-control" id="txtApellido2" name="txtApellido2"
                                    placeholder="Ingrese su 2er apellido">
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Correo
                                    </h5>
                                </label>
                                <input type="text" class="form-control" id="txtCorreo" name="txtCorreo"
                                    placeholder="Ingrese su email">
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Telefono
                                    </h5>
                                </label>
                                <input type="text" class="form-control" id="txtTel" name="txtTel"
                                    placeholder="Ingrese su telefono">
                            </div>
                            <div class="col-sm-14">
                                <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Rol</h5>

                                <select id="cboPerfil" name="cboPerfil" class="form-control">
                                    <option value="">Seleccione el rol</option>
                                    <option value="valor1">Gerente</option>
                                    <option value="valor2">Administrador</option>
                                    <option value="valor3">Agente</option>
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
                            <input type="submit" class="btn btn-black" value="Registrarse" name="btnRegistrar"></input>
                            <br /><br /> <br /><br /><br /><br />
                        </form>
                    </div>
                </div>
            </div>
            <!-- <footer class="bg-light text-center text-lg-start">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    <p>© Oficinas Centrales: +506 2525-6596 San Jose, Costa Rica</p>
                </div>

            </footer> -->
        </div>
        <div class="derecha">

        </div>

    </section>
    <!-- <form action="" method="POST" onsubmit="return Validacion();">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <p style="font-family: Georgia, 'Times New Roman', Times, serif;">Cédula</p>
                <input type="text" id="txtCedula" name="txtCedula" placeholder="ingrese cédula" class="form-control">
            </div>
        </div>
    </div>
</form> -->

</body>