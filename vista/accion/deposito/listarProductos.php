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
        $caminoArchivo = "../../img/productos/".$elemento->getIdproducto().".jpg";
        if (file_exists($caminoArchivo)){
            $nuevoElemento["imagen"] = "<img src='../img/productos/" . $elemento->getIdproducto() . ".jpg' width='100px' height='66px'>";
        } else {
            $nuevoElemento["imagen"] = "Sin Imagen";
        }
        
        array_push($arregloSalida, $nuevoElemento);
    }
    echo json_encode($arregloSalida);
?>