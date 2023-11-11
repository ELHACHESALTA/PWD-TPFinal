<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $arreglo["idproducto"] = $datos["idproducto"];
    $listaProductos = $objAbmProducto->buscar($arreglo);
    $datos["prodeshabilitado"] = $listaProductos[0]->getProdeshabilitado();
    $datos["procantstock"] = $listaProductos[0]->getProcantstock();
    if($objAbmProducto->modificacion($datos)){
        $respuesta["respuesta"] = "Se realizó correctamente";
    } else {
        $respuesta["respuesta"] = "No se pudo realizar la modificacion";
    }
    echo json_encode($respuesta);
?>