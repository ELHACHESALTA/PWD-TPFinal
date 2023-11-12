<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenuRol = new AbmMenuRol();
if($objAbmMenuRol->baja($datos)){
    $respuesta["respuesta"] = "Se eliminó correctamente el MenuRol";
} else {
    $respuesta["errorMsg"] = "No se pudo eliminar el MenuRol";
}

echo json_encode($respuesta);
?>