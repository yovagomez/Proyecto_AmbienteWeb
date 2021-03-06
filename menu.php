<?php
    session_start();
    include 'conexion.php';
    $AbiertaDB = AbrirDB();
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

<body style="background: #d6d6d6;">
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
                        <a class="dropdown-item" href="clientes.php">Clientes</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="factura.php">Factura</a>
                        <a class="dropdown-item" href="tiquete.php">Tiquete</a>
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

    <!-- Carrucel de Imagenes -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="overflow: scroll">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url('img/audi.jpeg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100) ">ELECTRIFICANDO EL FUTURO</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img/Meche-1.jpg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100)">AUTOS 100% ELECTRICOS</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img/Maserati-2.jpg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100)">EMOCIONES AMPLIFICADAS</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img/Mustang-3.jpg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100)">FlIP CARS EN CASA</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img/BMW-4.jpg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100)">SERVICIO A TU PUERTA</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img/Toyota-5.jpg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100)">AMIGABLE CON TU VIDA</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img/Mitsubishi-6.jpg');">
                <div class="absolute-div">
                    <div class="carousel-caption">
                        <h1 style="opacity: 0.5; filter: alpha(opacity=100)">BIENVENIDO A FLIP CARS</h1>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <div class="container-fluid">
        <h1 style="text-align: center;line-height: 100%;font-weight: 100;">
            <p>LO TENEMOS A SUS ESTILO Y NECESIDAD</p>
            <h5 style="text-align: center">En Flip Cars encontrara las mejores marcas en automoviles</h5>
        </h1>

        <br/><br/><br/>

        

        <div class="container-fluid" style="text-align: center;font-size: 0; display: inline-block; font-size: inherit;">
            
            <a href="eventos.php">
                    <img src="https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-enterprise-conference-technology-unbounded-dreams-unlimited-stage-background-image_182258.jpg"
                    class="w3-border w3-padding" alt="Eventos Programados" style="width:400px; height: 275px;opacity: 0.99;">
                <br/><br/>
                <h5 style="color: black;">Eventos</h5>    
            </a>
            <br/><br/>
            <a href="clientes.php">
                    <img src="https://www.questionpro.com/blog/wp-content/uploads/2017/02/0184-768x512.jpg"
                    class="w3-border w3-padding" alt="Eventos Programados" style="width:400px; height: 275px;opacity: 0.99;">
                <br/><br/>
                <h5 style="color: black;">Clientes</h5>    
            </a>

        </div>
        <br/><br/><br/>

        
    </div>
    <!-- Fin del Carrucel de Imagenes -->

    <!-- Espacio de Información --
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar fixed-top">
            <a class="navbar-brand" href="#">Información</a>
        </nav>
    </div>
    Fin Espacio de Información -->

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