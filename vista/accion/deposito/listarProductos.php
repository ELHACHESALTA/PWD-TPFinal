<?php
    include_once "../../../configuracion.php";
    $objAbmProducto = new AbmProducto();
    $listaProductos = $objAbmProducto->buscar(null);
    $arregloSalida = array(); 
    foreach ($listaProductos as $elemento) {
        $nuevoElemento['idproducto'] = $elemento->getIdproducto();
        $nuevoElemento['pronombre'] = $elemento->getPronombre();
        $nuevoElemento['prodetalle'] = $elemento->getProdetalle();
        $nuevoElemento['proprecio'] = $elemento->getProprecio();
        if ($elemento->getProdeshabilitado() == null){
            $nuevoElemento["prodeshabilitado"] = "Habilitado";
        } else {
            $nuevoElemento["prodeshabilitado"] = "Deshabilitado (" . $elemento->getProdeshabilitado() . ")";
        }
        array_push($arregloSalida, $nuevoElemento);
    }
    echo json_encode($arregloSalida);
?>