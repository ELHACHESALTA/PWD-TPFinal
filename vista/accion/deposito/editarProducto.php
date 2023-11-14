<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $arreglo["idproducto"] = $datos["idproducto"];
    $listaProductos = $objAbmProducto->buscar($arreglo);
    $datos["prodeshabilitado"] = $listaProductos[0]->getProdeshabilitado();
    $datos["procantstock"] = $listaProductos[0]->getProcantstock();
    if ($datos["proprecio"] > 0){
        if($objAbmProducto->modificacion($datos)){
            $respuesta["respuesta"] = "Se modificó el producto correctamente";
        } else {
            $respuesta["errorMsg"] = "No se pudo realizar la modificación del producto";
        }
    } else {
        $respuesta["errorMsg"] = "El precio debe ser mayor a 0";
    }
    echo json_encode($respuesta);
?>