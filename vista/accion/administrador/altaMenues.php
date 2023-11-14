<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenu = new AbmMenu();
$arreglo["idmenu"] = $datos["idpadre"];
$datos["medeshabilitado"] = null;
if ($objAbmMenu->buscar($arreglo)){
    if($objAbmMenu->alta($datos)){
        $respuesta["respuesta"] = "Se dio de alta el Menú correctamente";
    } else {
        $respuesta["errorMsg"] = "No se pudo realizar el alta del Menú";
    }    
} else {
    $respuesta["errorMsg"] = "No existe un Menú con el idpadre ingresado";
}
echo json_encode($respuesta);
?>