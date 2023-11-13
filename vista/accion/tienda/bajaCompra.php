<?php
    include_once ("../../../configuracion.php");
    $sesionActual = new Session();
    $objUsuario = $sesionActual -> getUsuario();
    $objAbmCompra = new AbmCompra();
    $arregloObjCompra = $objAbmCompra -> buscar(['idusuario' => $objUsuario -> getIdusuario(), 'metodo' => 'carrito']);
    if (count($arregloObjCompra) == 1){
        $objAbmCompraItem = new AbmCompraItem();
        $items = $objAbmCompraItem -> buscar(['idcompra' => $arregloObjCompra[0] -> getIdcompra()]);
        if (!empty($items)){
            foreach($items as $item){
                $objAbmCompraItem -> baja(['idcompraitem' => $item -> getIdcompraitem()]);
            }
            $objAbmCompra -> baja(['idcompra'=>$arregloObjCompra[0] -> getIdcompra()]);
        }
    }
    header("Location:../../paginas/carrito.php");
?>