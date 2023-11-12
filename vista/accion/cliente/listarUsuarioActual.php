<?php
    include_once "../../../configuracion.php";
    $sesionActual = new Session();
    $objAbmUsuario = new AbmUsuario();
    $usuarioActual = $objAbmUsuario -> buscar(['usnombre' => $sesionActual -> getUsuario() -> getUsnombre(), 'uspass' => $sesionActual -> getUsuario() -> getUspass()]);
    $arregloSalida = array();
    $arregloSalida2['idusuario'] = $usuarioActual[0] -> getIdusuario();
    $arregloSalida2['usnombre'] = $usuarioActual[0] -> getUsnombre();
    $arregloSalida2['uspass'] = $usuarioActual[0] -> getUspass();
    $arregloSalida2['usmail'] = $usuarioActual[0] -> getUsmail();
    array_push($arregloSalida, $arregloSalida2);
    echo json_encode($arregloSalida);
?>