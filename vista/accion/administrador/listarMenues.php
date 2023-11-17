<?php 
    include_once "../../../configuracion.php";
    $objAbmMenu = new AbmMenu();
    $arregloSalida = $objAbmMenu -> listarMenues();
    echo json_encode($arregloSalida);
?>