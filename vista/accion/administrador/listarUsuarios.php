<?php 
include_once "../../../configuracion.php";
$objAbmUsuario = new AbmUsuario();
$listaUsuarios = $objAbmUsuario->buscar(null);
$arreglo_salida = array();
foreach ($listaUsuarios as $elemento) {
    $nuevoElemento['idusuario'] = $elemento->getIdusuario();
    $nuevoElemento['usnombre'] = $elemento->getUsnombre();
    $nuevoElemento['uspass'] = $elemento->getUspass();
    $nuevoElemento['usmail'] = $elemento->getUsmail();
    if ($elemento->getUsdeshabilitado() == null || $elemento->getUsdeshabilitado() == "0000-00-00 00:00:00"){
    $nuevoElemento['usdeshabilitado'] = "Habilitado";
    } else {
    $nuevoElemento['usdeshabilitado'] = "Deshabilitado (" . $elemento->getUsdeshabilitado() . ")";
    }
    array_push($arreglo_salida, $nuevoElemento);
}
echo json_encode($arreglo_salida);