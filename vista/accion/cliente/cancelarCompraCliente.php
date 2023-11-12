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

if ($datos["idcompraestadotipo"] == 1){
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
                    $respuesta = "se cancelo la compra correctamente";
                } else {
                    $respuesta = "no se pudo cancelar la compra";    
                }
            } else {
                $respuesta = "no se pudo cancelar la compra";
            }
        } else {
            $respuesta = "la compra ya esta avanzada";
        }
    } else {
        $respuesta = "la compra ya está cancelada";
    }
} else {
    $respuesta = "no se puede cancelar la compra al siguiente estado debido a que el estado 3 es el maximo";
}
echo json_encode($respuesta);
?>