<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenu = new AbmMenu();
if($objAbmMenu->baja($datos)){
    $respuesta["respuesta"] = "Se cambio el estado del Menú correctamente";
} else {
    $respuesta["errorMsg"] = "No se pudo cambiar el estado del Menú";
}

echo json_encode($respuesta);
?>