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

if ($datos["idcompraestadotipo"] < 3 && $datos["idcompraestadotipo"] > 0){ // verifica que el id de compraestado tipo sea "iniciada" o "aceptada"
    if(!$compraCancelada){ // verifica que la compra no haya sido cancelada
        if (!$compraAvanzada2){ // verifica que la compra no haya sido avanzada
            $fechaActual = date('Y-m-d H:i:s');
            $datos["cefechafin"] = $fechaActual;
            if ($objAbmCompraEstado->modificacion($datos)){
                $datos["idcompraestado"] = null;
                $datos["idcompraestadotipo"] = $datos["idcompraestadotipo"]+1;
                $datos["cefechaini"] = $fechaActual;
                $datos["cefechafin"] = null;
                if($objAbmCompraEstado->alta($datos)){
                    $respuesta["respuesta"] = "Se cambió el estado de la compra correctamente";
                } else {
                    $respuesta["errorMsg"] = "No se pudo cambiar el estado de la compra";    
                }
            } else {
                $respuesta["errorMsg"] = "No se pudo cambiar el estado de la compra";
            }
        } else {
            $respuesta["errorMsg"] = "La compra ya ha sido avanzada";
        }
    } else {
        $respuesta["errorMsg"] = "La compra ya ha sido cancelada";
    }
} else {
    $respuesta["errorMsg"] = "No se puede pasar la compra al siguiente estado debido a que el estado 'enviada' o 'cancelada' es el último estado";
}

echo json_encode($respuesta);
?>