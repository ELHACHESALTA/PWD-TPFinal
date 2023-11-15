<?php
include_once "../../../configuracion.php";
$objAbmCompraItem = new AbmCompraItem();
$listaCompraItem = $objAbmCompraItem->buscar(null);
$arregloSalida = array(); 
foreach ($listaCompraItem as $elemento) {
    if ($elemento -> getObjCompra() -> getMetodo() == 'normal') {
        $nuevoElemento['idcompraitem'] = $elemento->getIdcompraitem();
        $nuevoElemento['idproducto'] = $elemento->getObjProducto()->getIdproducto();
        $nuevoElemento['pronombre'] = $elemento->getObjProducto()->getPronombre();
        $nuevoElemento['cicantidad'] = $elemento->getCicantidad();
        $nuevoElemento['idcompra'] = $elemento->getObjCompra()->getIdcompra();
        $nuevoElemento['usnombre'] = $elemento->getObjCompra()->getObjUsuario()->getUsnombre();
        array_push($arregloSalida, $nuevoElemento);
    }
}
echo json_encode($arregloSalida);
?>