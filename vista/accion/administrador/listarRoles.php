<?php 
include_once "../../../configuracion.php";
$objAbmRol = new AbmRol();
$listaRoles = $objAbmRol->buscar(null);
$arreglo_salida = array();
foreach ($listaRoles as $elemento) {
    $nuevoElemento['idrol'] = $elemento->getIdrol();
    $nuevoElemento['rodescripcion'] = $elemento->getRodescripcion();
    array_push($arreglo_salida, $nuevoElemento);
}
echo json_encode($arreglo_salida);