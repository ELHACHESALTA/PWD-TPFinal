<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$arreglo["idmenu"] = $datos["idmenu"];
$objAbmMenu = new AbmMenu();
$listaMenues = $objAbmMenu->buscar($arreglo);
$datos["medeshabilitado"] = $listaMenues[0]->getMedeshabilitado();
if($objAbmMenu->modificacion($datos)){
    $respuesta["respuesta"] = "Se modificó el Menú correctamente";
} else { 
    $respuesta["errorMsg"] = "No se pudo modificar el Menú";
}
echo json_encode($respuesta);
?>