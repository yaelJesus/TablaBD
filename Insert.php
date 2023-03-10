<?php
    $nombre = $_GET["nombre"];
    $matricula = $_GET["matricula"];
    $correo = $_GET["correo"];
    $materia = $_GET["materia"];
    $calificacion = $_GET["calificacion"];

    $enlace = mysqli_connect("localhost", "root", "", "tec");
    $datos = "INSERT INTO calificaciones(Nombre,Matricula,Correo,Materia,Calificacion) VALUES (?,?,?,?,?)";
    //En la parte de values puede ser asi, se puede sustituir por el que proporciona phpMyAdmin.
    
    $sentencia = mysqli_prepare($enlace,$datos);
    mysqli_stmt_bind_param($sentencia,"ssssi",$nombre,$matricula,$correo,$materia,$calificacion);
    if (mysqli_stmt_execute($sentencia)) {
        mysqli_stmt_close($sentencia);
        mysqli_close($enlace);
        header("Location: inicio.php");
        exit();
    }
    else {
        mysqli_stmt_close($sentencia);
        mysqli_close($enlace);
        header("Location: inicio.php");
        exit();
    }
?>