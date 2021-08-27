<?php

    include 'conexion.php';
    $AbiertaDB = AbrirDB();

    $queryFacturas = "CALL ConsultarFacturas('-1')";
    $respuestaFacturas = $AbiertaDB -> query($queryFacturas);

    if(isset($_POST['btnNuevaFactura'])){
        header("Location: nuevaFactura.php");
    }

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

<body style="background: #bababa;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar fixed-top">
        <a class="navbar-brand" href="menu.php">FLIP CARS S.A</a>
        <a class="navbar-brand" style="color: white;">FACTURA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- Fin del NavBar/Barra del Menu -->
    <form action="" method="post">


        <div class="container-fluid">

            <table class="table table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th><b>ID</b></th>
                        <th><b>Cliente</b></th>
                        <th><b>Agente</b></th>
                        <th><b>Vehiculo</b></th>
                        <th><b>Fecha Entrega</b></th>
                        <th><b>Total</b></th>
                        <th><b>Descripcion</b></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                                while($fila = mysqli_fetch_array($respuestaFacturas))
                                {
                                 echo "<tr>";
                                 echo "<td>" . $fila['idFactura'] . "</td>";
                                 echo "<td>" . $fila['idUsuario'] . "</td>";
                                 echo "<td>" . $fila['idAgente'] . "</td>";
                                 echo "<td>" . $fila['idVehiculo'] . "</td>";
                                 echo "<td>" . $fila['fechaEntrega'] . "</td>";
                                 echo "<td>" ."$ ". $fila['total'] . "</td>";
                                 echo "<td>" . $fila['descripcion'] . "</td>";
                                 echo "</tr>";
                                }
                            ?>

                </tbody>
            </table>

        </div>
        <br/><br/>
        <div class="col text-center">
            <input type="submit" class="btn btn-primary" value="Nueva Factura" name="btnNuevaFactura"></input>
            <br /><br />
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="css/simple-sidebar.js"></script>

        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
        </div>
    </form>
</body>

</html>