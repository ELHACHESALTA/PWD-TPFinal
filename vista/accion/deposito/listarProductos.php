<?php
    include_once "../../../configuracion.php";
    $objAbmProducto = new AbmProducto();
    $arregloSalida = $objAbmProducto -> listarProductos();
    echo json_encode($arregloSalida);
?>