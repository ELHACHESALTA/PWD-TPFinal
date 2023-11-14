<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuarioRol = new AbmUsuarioRol();
$arreglo1["idusuario"] = $datos["idusuario"];
$arreglo2["idrol"] = $datos["idrol"];
$objAbmUsuario = new AbmUsuario();
$objAbmRol = new AbmRol();
if ($objAbmUsuario->buscar($arreglo1)){
    if ($objAbmRol->buscar($arreglo2)){
        if ($objAbmUsuarioRol->buscar($datos)){
            $respuesta["errorMsg"] = "Ya existe esa relación con el idusuario y el idrol ingresados!";
        } else {
            if($objAbmUsuarioRol->alta($datos)){
                $respuesta["respuesta"] = "Se dio de alta el UsuarioRol correctamente!";
            } else {
                $respuesta["errorMsg"] = "No se pudo realizar el alta del UsuarioRol";
            }
        }
    } else {
        $respuesta["errorMsg"] = "No existe un Rol con el id ingresado";
    }
} else {
    $respuesta["errorMsg"] = "No existe un Usuario con el id ingresado";
}

echo json_encode($respuesta);