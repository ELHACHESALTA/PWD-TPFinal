<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuarioRol = new AbmUsuarioRol();
if($objAbmUsuarioRol->baja($datos)){
    $respuesta["respuesta"] = "se eliminó correctamente el UsuarioRol";
} else {
    $respuesta["errorMsg"] = "no se pudo eliminar el UsuarioRol";
}

echo json_encode($respuesta);