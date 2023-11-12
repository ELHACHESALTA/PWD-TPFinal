<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuarioRol = new AbmUsuarioRol();
if($objAbmUsuarioRol->alta($datos)){
    $respuesta["respuesta"] = "Se dio de alta el UsuarioRol correctamente!";
} else {
    $respuesta["errorMsg"] = "No se pudo realizar el alta del UsuarioRol";
}
echo json_encode($respuesta);