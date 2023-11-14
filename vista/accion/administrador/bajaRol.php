<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmRol = new AbmRol(); 
$objAbmUsuarioRol = new AbmUsuarioRol();
$objAbmMenuRol = new AbmMenuRol();
if ($objAbmUsuarioRol->buscar($datos) || $objAbmMenuRol->buscar($datos)){
    $respuesta["errorMsg"] = "No se pudo dar de baja el rol debido a que existe un UsuarioRol o un MenuRol con ese id.";
} else {
    if($objAbmRol->baja($datos)){
        $respuesta["respuesta"] = "Se dio de baja el Rol correctamente!";
    } else {
        $respuesta["errorMsg"] = "No se pudo dar de baja el Rol";
    }    
}

echo json_encode($respuesta);