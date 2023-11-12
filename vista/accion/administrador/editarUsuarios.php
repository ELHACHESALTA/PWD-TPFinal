<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$arreglo["idusuario"] = $datos["idusuario"];
$listaUsuarios = $objAbmUsuario->buscar($arreglo);
$datos["usdeshabilitado"] = $listaUsuarios[0]->getUsdeshabilitado();
if ($datos["uspass"] != $listaUsuarios[0]->getUspass()){
    $datos["uspass"] = md5($datos["uspass"]);    
}
if($objAbmUsuario->modificacion($datos)){
    $respuesta["respuesta"] = "Se modificó el usuario correctamente!";
} else {
    $respuesta["errorMsg"] = "No se pudo realizar la modificacion";
}
echo json_encode($respuesta);