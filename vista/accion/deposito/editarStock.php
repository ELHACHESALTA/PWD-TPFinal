<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $arreglo["idproducto"] = $datos["idproducto"];
    $listaProductos = $objAbmProducto->buscar($arreglo);
    $datos["proprecio"] = $listaProductos[0]->getProprecio();
    $datos["prodeshabilitado"] = $listaProductos[0]->getProdeshabilitado();
    $datos["procantstock"] = intval($datos["procantstock"]);
    if ($datos["procantstock"] > 0){
        if($objAbmProducto->modificacion($datos)){
            $respuesta["respuesta"] = "Se modificó el stock correctamente";
        } else {
            $respuesta["errorMsg"] = "No se pudo realizar la modificacion del stock";
        }    
    } else {
        $respuesta["errorMsg"] = "El stock debe ser mayor a 0";
    }
    echo json_encode($respuesta);
?>