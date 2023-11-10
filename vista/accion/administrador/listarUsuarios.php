<?php 
include_once "../../../configuracion.php";
$objAbmUsuario = new AbmUsuario();
$listaUsuarios = $objAbmUsuario->buscar(null);
$arregloSalida = array();
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
    array_push($arregloSalida, $nuevoElemento);
}
echo json_encode($arregloSalida);