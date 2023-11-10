<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenu = new AbmMenu();
if($objAbmMenu->baja($datos)){
    $respuesta = "se cambio el estado correctamente";
} else {
    $respuesta = "no se pudo cambiar el estado";
}

echo json_encode($respuesta);
?>