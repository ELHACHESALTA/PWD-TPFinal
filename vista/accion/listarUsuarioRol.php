<?php 
include_once "../../configuracion.php";
$objAbmUsuarioRol = new AbmUsuarioRol();
$listaUsuariosRol = $objAbmUsuarioRol->buscar(null);
$arreglo_salida = array();
foreach ($listaUsuariosRol as $elemento) {
    $nuevoElemento['idusuario'] = $elemento->getObjUsuario()->getIdusuario();
    $nuevoElemento['usnombre'] = $elemento->getObjUsuario()->getUsnombre();
    $nuevoElemento['idrol'] = $elemento->getObjRol()->getIdrol();
    $nuevoElemento['rodescripcion'] = $elemento->getObjRol()->getRodescripcion();
    array_push($arreglo_salida, $nuevoElemento);
}
echo json_encode($arreglo_salida);