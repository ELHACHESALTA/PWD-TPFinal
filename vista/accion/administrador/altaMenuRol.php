<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenuRol = new AbmMenuRol();
if($objAbmMenuRol->alta($datos)){
    $respuesta["respuesta"] = "Se dio de alta el MenuRol correctamente";
} else {
    $respuesta["errorMsg"] = "No se pudo realizar el alta del MenuRol";
}
echo json_encode($respuesta);
?>