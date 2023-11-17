<?php 
    include_once "../../../configuracion.php";
    $objAbmRol = new AbmRol();
    $arregloSalida = $objAbmRol -> listarRoles();
    echo json_encode($arregloSalida);
?>