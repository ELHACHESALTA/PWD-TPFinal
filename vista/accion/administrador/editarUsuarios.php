<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$arreglo["idusuario"] = $datos["idusuario"];
$listaUsuarios = $objAbmUsuario->buscar($arreglo);
$datos["usdeshabilitado"] = $listaUsuarios[0]->getUsdeshabilitado();
if($objAbmUsuario->modificacion($datos)){
    $respuesta["respuesta"] = "Se realizó correctamente";
} else {
    $respuesta["respuesta"] = "No se pudo realizar el alta";
}
echo json_encode($respuesta);