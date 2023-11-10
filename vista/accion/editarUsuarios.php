<?php 
include_once "../../configuracion.php";
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$listaUsuarios = $objAbmUsuario->buscar($datos["idusuario"]);
$datos["usdeshabilitado"] = $listaUsuarios[0]->getUsdeshabilitado();
if($objAbmUsuario->modificacion($datos)){
    $respuesta["respuesta"] = "Se realizó correctamente";
} else {
    $respuesta["respuesta"] = "No se pudo realizar el alta";
}
echo json_encode($respuesta);