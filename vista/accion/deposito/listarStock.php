<?php
    include_once "../../../configuracion.php";
    $objAbmProducto = new AbmProducto();
    $listaProductos = $objAbmProducto->buscar(null);
    $arregloSalida = array(); 
    foreach ($listaProductos as $elemento) {
        $nuevoElemento['idproducto'] = $elemento->getIdproducto();
        $nuevoElemento['pronombre'] = $elemento->getPronombre();
        $nuevoElemento['prodetalle'] = $elemento->getProdetalle();
        $nuevoElemento['procantstock'] = $elemento->getProcantstock();
        array_push($arregloSalida, $nuevoElemento);
    }
    echo json_encode($arregloSalida);
?>