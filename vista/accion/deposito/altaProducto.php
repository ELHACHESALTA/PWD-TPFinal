<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmProducto = new AbmProducto();
    $respuesta = $objAbmProducto -> crearProducto($datos);
    echo json_encode($respuesta);
?>