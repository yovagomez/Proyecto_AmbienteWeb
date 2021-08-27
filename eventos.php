<?php 
    include 'conexion.php';
    $AbiertaDB = AbrirDB();

    $queryEventos = "CALL ConsultarEvento('-1')";
    $respuestaEventos = $AbiertaDB -> query($queryEventos);

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

<body style="background:black;">
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

    <div class="container;style=text-align: center;">
        <img src="http://4.bp.blogspot.com/-dYK-9DR3fms/Ufrcxlk88GI/AAAAAAAAIm8/Q731oQtmWIk/s1600/Descargar+Pack+Wallpaper+Gratis+Abstractos+(2)-919643414.png"
            style="opacity: 0.99;
         width: 1885px;height: 500px;">
        <br /><br />
        <p style="font-family:Verdana, Geneva, Tahoma, sans-serif;color: white;font-size: 500%;text-align: center;">
            EVENTOS</p>
        <br /><br /><br /><br />
        <table class="table" style="color:white;">
            <thead class="thead-dark">
                <tr style="text-align: center;"> 
                    <th scope="col">Detalle</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>

                <?php

                                  while($fila = mysqli_fetch_array($respuestaEventos))
                                {
                                   echo "<tr style='text-align: center'>";
                                   echo "<td>" . $fila['descripcion'] . "</td>";
                                   echo "<td>" . $fila['lugar'] . "</td>";
                                   echo "<td>" . $fila['fecha'] . "</td>";
                                   echo "<td><a href='EditarEventos.php?q=" . $fila['idEvento'] . "' class='btn btn-danger'>Editar</a></td>";
                                   echo "</tr>";
                                } 
                        ?>
            </tbody>
        </table>
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