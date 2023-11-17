<?php
    include_once "../../../configuracion.php";
    $objAbmProducto = new AbmProducto();
    $arregloSalida = $objAbmProducto -> listarStock();
    echo json_encode($arregloSalida);
?>