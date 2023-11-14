<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$arreglo["idmenu"] = $datos["idmenu"];
$objAbmMenu = new AbmMenu();
$listaMenues = $objAbmMenu->buscar($arreglo);
$datos["medeshabilitado"] = $listaMenues[0]->getMedeshabilitado();
$arreglo1["idmenu"] = $datos["idpadre"];
if ($objAbmMenu->buscar($arreglo1)){
    if($objAbmMenu->modificacion($datos)){
        $respuesta["respuesta"] = "Se modificó el Menú correctamente";
    } else { 
        $respuesta["errorMsg"] = "No se pudo modificar el Menú";
    }    
} else {
    $respuesta["errorMsg"] = "No existe un Menú con el idpadre ingresado";
}
echo json_encode($respuesta);
?>