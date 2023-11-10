<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$arreglo["idmenu"] = $datos["idmenu"];
$objAbmMenu = new AbmMenu();
$listaMenues = $objAbmMenu->buscar($arreglo);
$datos["medeshabilitado"] = $listaMenues[0]->getMedeshabilitado();
if($objAbmMenu->modificacion($datos)){
    $respuesta["respuesta"] = "Se realizó correctamente";
} else { 
    $respuesta["respuesta"] = "No se pudo realizar el alta";
}
echo json_encode($respuesta);
?>