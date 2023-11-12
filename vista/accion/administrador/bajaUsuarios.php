<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
if($objAbmUsuario->baja($datos)){
    $respuesta["respuesta"] = "se cambio el estado del usuario correctamente!";
} else {
    $respuesta["errorMsg"] = "no se pudo cambiar el estado del usuario";
}

echo json_encode($respuesta);