<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    if (isset($datos[0]["imagen"]) && isset($datos["idproducto"])){
        $objAbmProducto = new AbmProducto();
        $respuesta = $objAbmProducto -> cargaDeImagen($datos);
    } else {
        $respuesta["errorMsg"] = "No se ha adjuntado ningún archivo";
    }
    echo json_encode($respuesta);
?>