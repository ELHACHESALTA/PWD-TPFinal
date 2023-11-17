<?php 
    include_once "../../../configuracion.php";
    $objAbmUsuario = new AbmUsuario();
    $arregloSalida = $objAbmUsuario -> listarUsuarios();
    echo json_encode($arregloSalida);
?>