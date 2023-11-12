<?php 
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    if($objAbmProducto->baja($datos)){
        $respuesta["respuesta"] = "se cambio el estado del producto correctamente";
    } else {
        $respuesta["errorMsg"] = "no se pudo cambiar el estado del producto";
    }

    echo json_encode($respuesta);