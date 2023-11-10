<?php
    include_once '../../configuracion.php';
    $datos = data_submitted();
    $objSession = new Session();
    $objSession -> iniciar($datos["usnombre"], md5($datos["uspass"]));
    if($objSession -> validar()){
        header('Location:../paginas/paginaSegura.php');   
    } else {
        //$objSession->cerrar();
        header('Location:../paginas/login.php?error=Usuario y/o contraseña incorrecto');
    }
?>