<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $datos["prodeshabilitado"] = null;
    $datos["procantstock"] = 0;
    $datos["proprecio"] = intval($datos["proprecio"]);
    if($objAbmProducto->alta($datos)){
        $respuesta["respuesta"] = "Se realizó correctamente";
    } else {
        $respuesta["respuesta"] = "No se pudo realizar el alta";
    }
    echo json_encode($respuesta);
?>