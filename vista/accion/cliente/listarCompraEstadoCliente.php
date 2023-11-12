<?php
    include_once "../../../configuracion.php";
    $sesionActual = new Session();
    $objAbmUsuario = new AbmUsuario();
    $usuario = $objAbmUsuario->buscar(['usnombre' => $sesionActual -> getUsuario() -> getUsnombre(), 'uspass' => $sesionActual -> getUsuario() -> getUspass()]);
    $idUsuario = $usuario[0]->getIdusuario();
    $objAbmCompraEstado = new AbmCompraEstado();
    $listaCompraEstado = $objAbmCompraEstado->buscar(null);
    $arreglo = array();
    $arregloSalida = array();
    foreach ($listaCompraEstado as $elemento) {
        if ($elemento->getObjCompra()->getObjUsuario()->getIdusuario() == $idUsuario){
            $nuevoElemento['idcompraestado'] = $elemento->getIdcompraestado();
            $nuevoElemento['idcompra'] = $elemento->getObjCompra()->getIdcompra();
            $nuevoElemento['idcompraestadotipo'] = $elemento->getObjCompraEstadoTipo()->getIdcompraestadotipo();
            $nuevoElemento['cetdescripcion'] = $elemento->getObjCompraEstadoTipo()->getCetdescripcion();
            $nuevoElemento['cefechaini'] = $elemento->getCefechaini();
            $nuevoElemento['cefechafin'] = $elemento->getCefechafin();
            $nuevoElemento['usnombre'] = $elemento->getObjCompra()->getObjUsuario()->getUsnombre();
            array_push($arregloSalida, $nuevoElemento);
        }
    }
    echo json_encode($arregloSalida);
?> 