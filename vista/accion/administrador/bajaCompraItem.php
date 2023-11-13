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
    if ($objAbmCompraItem->baja($arreglo1)){
        $respuesta["respuesta"] = "La compraItem se dio de baja correctamente";
    } else {
        $respuesta["errorMsg"] = "No se pudo dar de baja la compraItem";
    }
} else {
    $respuesta["errorMsg"] = "Solo se pueden eliminar items cuando el estado de la compra es 'iniciada'";
}
echo json_encode($respuesta);
?>