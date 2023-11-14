<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $datos["prodeshabilitado"] = null;
    $datos["procantstock"] = 0;
    $datos["proprecio"] = intval($datos["proprecio"]);
    if ($datos["proprecio"] > 0){
        if($objAbmProducto->alta($datos)){
            $respuesta["respuesta"] = "Se dio de alta el producto correctamente";
        } else {
            $respuesta["errorMsg"] = "No se pudo realizar el alta del producto";
        }    
    } else {
        $respuesta["errorMsg"] = "El precio debe ser mayor a 0";
    }
    echo json_encode($respuesta);
?>