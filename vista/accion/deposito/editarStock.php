<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $arreglo["idproducto"] = $datos["idproducto"];
    $listaProductos = $objAbmProducto->buscar($arreglo);
    $datos["proprecio"] = $listaProductos[0]->getProprecio();
    $datos["prodeshabilitado"] = $listaProductos[0]->getProdeshabilitado();
    $datos["procantstock"] = intval($datos["procantstock"]);
    if($objAbmProducto->modificacion($datos)){
        $respuesta["respuesta"] = "Se modificó el stock correctamente";
    } else {
        $respuesta["errorMsg"] = "No se pudo realizar la modificacion del stock";
    }
    echo json_encode($respuesta);
?>