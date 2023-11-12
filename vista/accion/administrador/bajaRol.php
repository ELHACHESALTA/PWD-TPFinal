<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmRol = new AbmRol();
if($objAbmRol->baja($datos)){
    $respuesta["respuesta"] = "Se dio de baja el Rol correctamente!";
} else {
    $respuesta["errorMsg"] = "No se pudo dar de baja el Rol";
}

echo json_encode($respuesta);