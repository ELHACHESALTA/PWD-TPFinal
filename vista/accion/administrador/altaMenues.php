<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenu = new AbmMenu();
$datos["medeshabilitado"] = null;
if($objAbmMenu->alta($datos)){
    $respuesta["respuesta"] = "Se dio de alta el Menú correctamente";
} else {
    $respuesta["errorMsg"] = "No se pudo realizar el alta del Menú";
}
echo json_encode($respuesta);
?>