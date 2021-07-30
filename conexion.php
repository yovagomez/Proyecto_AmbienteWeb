<?php

    function AbrirDB(){
        $server = "localhost";
        $user = "root";
        $password = "";
        $dataBase = "proyecto";

        return new mysqli($server,$user,$password,$dataBase);
    }

    function CerrarDB($conexion) {
        $conexion -> close();
    }


?>