<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$datos["usdeshabilitado"] = null;
if($objAbmUsuario->alta($datos)){
    $respuesta["respuesta"] = "Se dio de alta el usuario correctamente"; 
} else {
    $respuesta["errorMsg"] = "No se pudo realizar el alta";
}
echo json_encode($respuesta); 