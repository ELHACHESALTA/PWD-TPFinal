<?php
    include_once ("../../../configuracion.php");
    $datos = data_submitted();
    if (isset($datos['idproducto']) && isset($datos['cantidad'])){
        $objAbmCompra = new AbmCompra();
        if (isset($datos['compra'])){
            $sesionActual = new Session();
            $objUsuario = $sesionActual -> getUsuario();
            //Busco compras agregadas al carrito por el usuario activo
            $arregloObjCompra = $objAbmCompra -> buscar(['idusuario' => $objUsuario->getIdusuario(),'metodo' => 'carrito']);
            if (!empty($arregloObjCompra)){
                if (count($arregloObjCompra) == 1){  //Solo puede haber 1 carrito activo
                    $objAbmCompraItem = new AbmCompraItem();
                    //Chequeo si en la compra ya se habia encargado el mismo producto
                    $arregloCompraItem = $objAbmCompraItem -> buscar(['idcompra' => $arregloObjCompra[0] -> getIdcompra()]);
                    $carritoEncontrado = false;
                    if (!empty($arregloCompraItem)){
                        foreach($arregloCompraItem as $item){
                            if ($item -> getObjProducto() -> getIdproducto() == $datos['idproducto']){
                                $carritoEncontrado = true;
                                //Controlo stock
                                $cantidadSuma = ($item -> getCicantidad()) + ($datos['cantidad']);
                                if ($cantidadSuma <= ($item -> getObjProducto() -> getProcantstock())){
                                    $objAbmCompraItem = new AbmCompraItem();
                                    $cantidadFinal = $objAbmCompraItem -> modificacion(['idcompraitem' => $item -> getIdcompraitem(), 'idproducto' => $datos['idproducto'], 'idcompra' => $arregloObjCompra[0] -> getIdcompra(), 'cicantidad' => $cantidadSuma]);
                                    if ($cantidadFinal){
                                        $redireccion = 'Location:../../paginas/carrito.php';
                                    }else{
                                        $redireccion = "Location:../../paginas/productos.php?idproducto=" . $datos['idproducto'] . "&error=1";
                                    }
                                }else{
                                    $redireccion = "Location:../../paginas/productos.php?idproducto=" . $datos['idproducto'] . "&error=2";
                                }
                            }
                        }
                    }
                    if (!$carritoEncontrado){
                        $itemAgregado = $objAbmCompraItem -> alta(['idproducto' => $datos['idproducto'], 'idcompra' => $arregloObjCompra[0] -> getIdcompra(),'cicantidad' => $datos['cantidad']]);
                        if ($itemAgregado){
                            $redireccion = 'Location:../../paginas/carrito.php';
                        }else{

                            $redireccion = "Location:../../paginas/productos.php?idproducto=" . $datos['idproducto'] . "&error=1";
                        }
                    }
                    
                }else{
                    $redireccion = "Location:../../paginas/productos.php?idproducto=" . $datos['idproducto'] . "&error=1";
                }
            }else{  //Si no hay carritos activos inicio uno.
                $compraAgregada = $objAbmCompra -> alta(['idusuario' => $objUsuario->getIdusuario(), 'cofecha' => $date = date('Y-m-d H:i:s'),  'metodo' => 'carrito']);
                $arregloObjCompra = $objAbmCompra -> buscar(['idusuario' => $objUsuario->getIdusuario(), 'cofecha' => $date = date('Y-m-d H:i:s'), 'metodo' => 'carrito']);
                if ($compraAgregada){
                    $objAbmCompraItem = new AbmCompraItem();
                    $itemAgregado = $objAbmCompraItem -> alta(['idproducto' => $datos['idproducto'], 'idcompra' => $arregloObjCompra[0] -> getIdcompra(), 'cicantidad' => $datos['cantidad']]);
                    if ($itemAgregado){
                        $redireccion = 'Location:../../paginas/carrito.php';
                    }else{
                        $redireccion = "Location:../../paginas/productos.php?idproducto=" . $datos['idproducto'] . "&error=1";
                    }
                }else{
                    $redireccion = "Location:../../paginas/productos.php?idproducto=" . $datos['idproducto'] . "&error=1";
                }
            }
        }
        header($redireccion);
    }else{
        header("Location:../../paginas/productos.php?idproducto=" . $datos['idproducto']."&error=1"); 
    }

?>