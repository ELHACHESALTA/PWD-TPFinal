<?php
include_once "../../../configuracion.php";
$objAbmCompraEstado = new AbmCompraEstado();
$listaCompraEstado = $objAbmCompraEstado->buscar(null);
$arregloSalida = array(); 
foreach ($listaCompraEstado as $elemento) {
    $nuevoElemento['idcompraestado'] = $elemento->getIdcompraestado();
    $nuevoElemento['idcompra'] = $elemento->getObjCompra()->getIdcompra();
    $nuevoElemento['idcompraestadotipo'] = $elemento->getObjCompraEstadoTipo()->getIdcompraestadotipo();
    $nuevoElemento['cetdescripcion'] = $elemento->getObjCompraEstadoTipo()->getCetdescripcion();
    $nuevoElemento['cefechaini'] = $elemento->getCefechaini();
    $nuevoElemento['cefechafin'] = $elemento->getCefechafin();
    array_push($arregloSalida, $nuevoElemento);
}
echo json_encode($arregloSalida);
?>