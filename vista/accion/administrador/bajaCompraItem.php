<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmCompraItem = new AbmCompraItem();
    $respuesta = $objAbmCompraItem -> eliminarCompraItem($datos);
    echo json_encode($respuesta);
?>