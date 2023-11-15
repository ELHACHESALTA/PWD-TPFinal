<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$arreglo["idcompra"] = $datos["idcompra"];
$arreglo1["idcompraitem"] = $datos["idcompraitem"];
$objAbmCompraItem = new AbmCompraItem();
$objAbmCompraEstado = new AbmCompraEstado();
$listaCompraEstado = $objAbmCompraEstado->buscar(null);
$estadoMasAvanzado = 0;
for($i=0; $i < count($listaCompraEstado); $i++){
    if ($listaCompraEstado[$i]->getObjCompraEstadoTipo()->getIdcompraestadotipo() > $estadoMasAvanzado
    && $listaCompraEstado[$i]->getObjCompra()->getIdcompra() == $datos["idcompra"]){
        $estadoMasAvanzado = $listaCompraEstado[$i]->getObjCompraEstadoTipo()->getIdcompraestadotipo();
    }
}
if ($estadoMasAvanzado == 1){
    $objAbmCompraItem1 = new AbmCompraItem();
    $arregloObjCompraItem = $objAbmCompraItem1 -> buscar($arreglo1);
    $cantidadDevolver = $arregloObjCompraItem[0] -> getCicantidad();
    $objAbmProducto = new AbmProducto();
    $idProductoDevolver = $arregloObjCompraItem[0] -> getObjProducto() -> getIdproducto();
    $arregloObjProducto = $objAbmProducto -> buscar(['idproducto' => $idProductoDevolver]);
    $cantidadActual = $arregloObjProducto[0] -> getProcantstock();
    $nuevaCantidad = $cantidadActual + $cantidadDevolver;

    $productoModificado['idproducto'] = $idProductoDevolver;
    $productoModificado['pronombre'] = $arregloObjProducto[0] -> getPronombre();
    $productoModificado['prodetalle'] = $arregloObjProducto[0] -> getProdetalle();
    $productoModificado['procantstock'] = $nuevaCantidad;
    $productoModificado['proprecio'] = $arregloObjProducto[0] -> getProPrecio();
    $productoModificado['prodeshabilitado'] = $arregloObjProducto[0] -> getProdeshabilitado();
    if ($objAbmCompraItem->baja($arreglo1)){
        if ($objAbmProducto -> modificacion($productoModificado)) {
            $respuesta["respuesta"] = "La compraItem se dio de baja correctamente y se devolvieron los articulos al stock";
        } else {
            $respuesta["errorMsg"] = "No se pudo dar de baja la compraItem";
        }
    } else {
        $respuesta["errorMsg"] = "No se pudo dar de baja la compraItem";
    }
} else {
    $respuesta["errorMsg"] = "Solo se pueden eliminar items cuando el estado de la compra es 'iniciada'";
}
echo json_encode($respuesta);
?>