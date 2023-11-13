<?php
    include_once ("../../../configuracion.php");
    $datos = data_submitted();
    if (isset($datos['idcompra'])){
        $objAbmCompra = new AbmCompra();
        $compraCargar = $objAbmCompra -> buscar(['idcompra' => $datos['idcompra']]);
        $objAbmCompraItem = new AbmCompraitem();
        $arregloItemsCargar = $objAbmCompraItem -> buscar(['idcompra']);
        $objAbmProducto = new AbmProducto();
        $sinStock = false;
        foreach($arregloItemsCargar as $item){
            $productoCarga = $item -> getObjProducto();
            $cantidadDisponible = ($productoCarga -> getProcantstock())-($item -> getCicantidad());
            if ($cantidadDisponible < 0){
                $sinStock = true;
                //Elimino el producto sin stock del carrito
                $objAbmCompraItem -> baja(['idcompraitem' => $item -> getIdcompraitem()]);
            }
        }
        if (!$sinStock){
            //Cambio el metodo de compra de 'carrito' a 'normal' para que no se cargue en la tabla de carrito.
            $objAbmCompra -> modificacion(['idcompra' => $compraCargar[0] -> getIdcompra(),'cofecha' => $compraCargar[0] -> getCofecha(),'idusuario' => $compraCargar[0] -> getObjUsuario() -> getIdusuario(), 'metodo' => 'normal']);
            //Pongo la compra en estado 'iniciada'
            $objAbmCompraEstado = new AbmCompraestado();
            $resultadoCompra = $objAbmCompraEstado -> alta(['idcompra' => $datos['idcompra'], 'idcompraestadotipo' => 1,'cefechaini' => date('Y-m-d H:i:s'), 'cefechafin' => NULL]);
            if ($resultadoCompra){
                //Resto los items comprados del stock
                foreach($arregloItemsCargar as $item){
                    $productoCarga = $item -> getObjProducto();
                    $cantidadFinal = ($productoCarga -> getProcantstock()) - ($item -> getCicantidad());
                    $objAbmProducto -> modificacion(['idproducto' => $productoCarga -> getIdproducto(), 'pronombre' => $productoCarga -> getPronombre(), 'prodetalle' => $productoCarga -> getProdetalle(), 'proprecio' => $productoCarga -> getProprecio(), 'prodeshabilitado' => $productoCarga -> getProdeshabilitado(), 'procantstock' => $cantidadFinal]);
                }
                $redireccion="Location:../../paginas/tiendaFinalizar.php?transaccion=exito";
            }else{
                $redireccion="Location:../../paginas/tiendaFinalizar.php?transaccion=fallo";
            }
        }else{
            $redireccion = "Location:../../paginas/tiendaFinalizar.php?transaccion=stock";
        }
        
        header($redireccion);
    }else{
        header("Location:../../paginas/tiendaFinalizar.php?transaccion=fallo");
    }
?>