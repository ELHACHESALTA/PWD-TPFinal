<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
$objAbmMenu = new AbmMenu();
$listaMenues = $objAbmMenu->buscar(null);
$arregloSalida = array();
foreach ($listaMenues as $elemento) {
    $nuevoElemento['idmenu'] = $elemento->getIdmenu();
    $nuevoElemento['menombre'] = $elemento->getMenombre();
    $nuevoElemento['medescripcion'] = $elemento->getMedescripcion();
    if ($elemento -> getObjMenu() != NULL) {
        $nuevoElemento['idpadre'] = $elemento->getObjMenu()->getIdmenu();
    } else {
        $nuevoElemento['idpadre'] = NULL;
    }
    if ($elemento->getMedeshabilitado() == null || $elemento->getMedeshabilitado() == "0000-00-00 00:00:00"){
    $nuevoElemento['medeshabilitado'] = "Habilitado";
    } else {
    $nuevoElemento['medeshabilitado'] = "Deshabilitado (" . $elemento->getMedeshabilitado() . ")";
    }
    array_push($arregloSalida, $nuevoElemento);
}
echo json_encode($arregloSalida);