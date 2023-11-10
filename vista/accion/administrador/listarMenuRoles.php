<?php 
include_once "../../../configuracion.php";
$objAbmMenuRol = new AbmMenuRol();
$listaMenuRoles = $objAbmMenuRol->buscar(null);
$arregloSalida = array();
foreach ($listaMenuRoles as $elemento) {
    $nuevoElemento['idmenu'] = $elemento->getObjMenu()->getIdmenu();
    $nuevoElemento['menombre'] = $elemento->getObjMenu()->getMenombre();
    $nuevoElemento['idrol'] = $elemento->getObjRol()->getIdrol();
    $nuevoElemento['rodescripcion'] = $elemento->getObjRol()->getRodescripcion();
    array_push($arregloSalida, $nuevoElemento);
}
echo json_encode($arregloSalida);
?>