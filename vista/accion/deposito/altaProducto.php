<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $datos["prodeshabilitado"] = null;
    $datos["procantstock"] = 0;
    $datos["proprecio"] = intval($datos["proprecio"]);
    if($objAbmProducto->alta($datos)){
        $respuesta["respuesta"] = "Se dio de alta el producto correctamente";
    } else {
        $respuesta["errorMsg"] = "No se pudo realizar el alta del producto";
    }
    echo json_encode($respuesta);
?>