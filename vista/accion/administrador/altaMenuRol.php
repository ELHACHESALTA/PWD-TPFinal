<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenuRol = new AbmMenuRol();
$objAbmMenu = new AbmMenu();
$objAbmRol = new AbmRol();
$arreglo1["idmenu"] = $datos["idmenu"]; 
$arreglo2["idrol"] = $datos["idrol"];
if ($objAbmMenu->buscar($arreglo1)){
    if ($objAbmRol->buscar($arreglo2)){
        if($objAbmMenuRol->alta($datos)){
            $respuesta["respuesta"] = "Se dio de alta el MenuRol correctamente";
        } else {
            $respuesta["errorMsg"] = "No se pudo realizar el alta del MenuRol";
        }        
    } else {
        $respuesta["errorMsg"] = "No existe un Rol con el idrol ingresado";
    }
} else {
    $respuesta["errorMsg"] = "No existe un Menú con el idmenu ingresado";
}
echo json_encode($respuesta);
?>