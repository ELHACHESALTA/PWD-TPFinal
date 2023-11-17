<?php 
    include_once "../../../configuracion.php";
    $objAbmUsuarioRol = new AbmUsuarioRol();
    $arregloSalida = $objAbmUsuarioRol -> listarUsuarioRol();
    echo json_encode($arregloSalida);
?>