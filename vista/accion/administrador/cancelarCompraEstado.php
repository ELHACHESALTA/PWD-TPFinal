<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$arreglo["idcompra"] = $datos["idcompra"];
$objAbmCompraEstado = new AbmCompraEstado();

$listaCompraEstadoConId = $objAbmCompraEstado->buscar($arreglo);
$compraCancelada = false;
$i = 0;
while(!$compraCancelada && $i < count($listaCompraEstadoConId)){
    if($listaCompraEstadoConId[$i]->getObjCompraEstadoTipo()->getIdcompraestadotipo() == 4){
        $compraCancelada = true;
    } else {
        $i++;
    }
}
$arregloCompraEstado = $objAbmCompraEstado->buscar(null);
$compraAvanzada2 = false;
$i = 0;
while ((!$compraAvanzada2) && ($i < count($arregloCompraEstado))){
    if ($arregloCompraEstado[$i]->getObjCompraEstadoTipo()->getIdcompraestadotipo() > $datos["idcompraestadotipo"] 
    && $arregloCompraEstado[$i]->getObjCompra()->getIdcompra() == $datos["idcompra"]){
        $compraAvanzada2 = true;
    } else {
        $i++;
    }
}

if ($datos["idcompraestadotipo"] <= 3 && $datos["idcompraestadotipo"] > 0){
    if (!$compraCancelada){
        if (!$compraAvanzada2){
            $fechaActual = date('Y-m-d H:i:s');
            $datos["cefechafin"] = $fechaActual;
            if ($objAbmCompraEstado->modificacion($datos)){
                $datos["idcompraestado"] = null;
                $datos["idcompraestadotipo"] = 4;
                $datos["cefechaini"] = $fechaActual;
                $datos["cefechafin"] = $fechaActual;
                if($objAbmCompraEstado->alta($datos)){
                    $objAbmCompraItem = new AbmCompraItem();
                    $listaCompraItem = $objAbmCompraItem->buscar($arreglo);
                    if ($listaCompraItem){
                        foreach($listaCompraItem as $compraItem){
                            $cantidadItems = $compraItem->getCicantidad();
                            $objProducto = $compraItem->getObjProducto();
                            $nuevoStock = $cantidadItems + $objProducto->getProcantstock();
                            $objAbmProducto = new AbmProducto();
                            $arregloParaModificar["idproducto"] = $objProducto->getIdproducto();
                            $arregloParaModificar["pronombre"] = $objProducto->getPronombre();
                            $arregloParaModificar["prodetalle"] = $objProducto->getProdetalle();
                            $arregloParaModificar["procantstock"] = $nuevoStock;
                            $arregloParaModificar["proprecio"] = $objProducto->getProprecio();
                            $arregloParaModificar["prodeshabilitado"] = $objProducto->getProdeshabilitado();
                            if ($objAbmProducto->modificacion($arregloParaModificar)){
                                $respuesta["respuesta"] = "Se canceló la compra y se actualizó el stock correctamente";
                            } else {
                                $respuesta["errorMsg"] = "No se pudo actualizar el stock";    
                            }
                        }
                    }
                } else {
                    $respuesta["errorMsg"] = "No se pudo cancelar la compra";    
                }
            } else {
                $respuesta["errorMsg"] = "No se pudo cancelar la compra";
            }
        } else {
            $respuesta["errorMsg"] = "La compra ya está avanzada";
        }
    } else {
        $respuesta["errorMsg"] = "La compra ya está cancelada";
    }
} else {
    $respuesta["errorMsg"] = "No se puede cancelar la compra al siguiente estado debido a que el estado 'enviada' o 'cancelada' es el último estado";
}
echo json_encode($respuesta);
?>