<?php 
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    if($objAbmProducto->baja($datos)){
        $respuesta = "se cambio el estado correctamente";
    } else {
        $respuesta = "no se pudo cambiar el estado";
    }

    echo json_encode($respuesta);