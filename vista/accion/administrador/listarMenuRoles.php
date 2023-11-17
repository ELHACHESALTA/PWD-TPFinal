<?php 
    include_once "../../../configuracion.php";
    $objAbmMenuRol = new AbmMenuRol();
    $arregloSalida = $objAbmMenuRol -> listarMenuRoles();
    echo json_encode($arregloSalida);
?>