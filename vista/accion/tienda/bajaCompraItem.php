<?php
    include_once ("../../../configuracion.php");
    $datos = data_submitted();
    if (isset($datos['idcompraitem'])){
        $objAbmItem = new AbmCompraitem();
        $arregloObjCompraItem = $objAbmItem -> buscar(['idcompraitem' => $datos['idcompraitem']]);
        $idCompraActual = $arregloObjCompraItem[0] -> getObjCompra() -> getIdcompra();
        $objAbmItem -> baja(['idcompraitem' => $datos['idcompraitem']]);
        $arregloObjCompraItem = $objAbmItem -> buscar(['idcompra' => $idCompraActual]);
        if ($arregloObjCompraItem == []) {
            $objAbmCompra = new AbmCompra();
            $objAbmCompra -> baja(['idcompra' => $idCompraActual]);
        }
    }
    header("Location:../../paginas/carrito.php");
?>