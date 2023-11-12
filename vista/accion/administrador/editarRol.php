<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmRol = new AbmRol();
if($objAbmRol->modificacion($datos)){
    $respuesta["respuesta"] = "Se modificó el Rol correctamente";
} else {
    $respuesta["errorMsg"] = "No se pudo modificar el Rol";
}
echo json_encode($respuesta);