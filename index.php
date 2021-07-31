<?php

    if(isset($_POST['btnLogin']))
    {
        include 'conexion.php';
        $AbiertaDB = AbrirDB();

        $usuario = $_POST['txtUsuario'];
        $password = $_POST['txtPassword'];
        $queryLogin = "CALL validarLogin('$usuario','$password')";
        $Resultado = $AbiertaDB -> query($queryLogin);
        $filas = mysqli_num_rows($Resultado);
        if($filas > 0){
            header("Location: menu.php"); 
        }else{
            $AbiertaDB -> error;
        } 
        mysqli_free_result($Resultado);
        CerrarDB($AbiertaDB);

    }

    if(isset($_POST['btnRegistro']))
    {
        header("Location: registro.php");

    }

    // $queryAgente = "CALL ConsultarAgente('$idAgente')";
    // $respuestaAgente = $AbiertaDB -> query($queryAgente);
    // $AbiertaDB -> next_result();

    // $usuarioEncontrado = mysqli_fetch_array($respuestaAgente);


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
        <div class="izquierda" style="text-align: center">
            <br /><br /> <br /><br /> <br />
            <div style="font-family: Georgia, 'Times New Roman', Times, serif">
                <h1>FLIP CARS</h1>
            </div>
            <div style="font-family: Georgia, 'Times New Roman', Times, serif; opacity: 0.5;">
                <p>Venta y Alquiler de Vehiculos</p>
            </div>
            <br /><br /> <br />
            <div class="main">
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Usuario</h5>
                                </label>
                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario"
                                    placeholder="Ingrese usuario" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;">Contraseña
                                    </h5>
                                </label>
                                <input type="password" class="form-control" id="txtPassword" name="txtPassword"
                                    placeholder="Ingrese contraseña" required>
                            </div>
                            <input type="submit" class="btn btn-black" value="Iniciar Sesión" name="btnLogin"></input>
                            <br /><br />
                        </form>
                        <form action="" method="POST">
                            <input type="submit" class="btn btn-black" value="Crear nueva cuenta"
                                name="btnRegistro"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="derecha">
        </div>
    </section>
</body>