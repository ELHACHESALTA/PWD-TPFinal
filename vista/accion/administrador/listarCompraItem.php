<?php
    include_once "../../../configuracion.php";
    $objAbmCompraItem = new AbmCompraItem();
    $arregloSalida = $objAbmCompraItem -> listarCompraItem();
    echo json_encode($arregloSalida);
?>