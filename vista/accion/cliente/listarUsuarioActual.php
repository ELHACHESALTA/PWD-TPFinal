<?php
    include_once "../../../configuracion.php";
    $objAbmUsuario = new AbmUsuario();
    $arregloSalida = $objAbmUsuario -> listarUsuarioActual();
    echo json_encode($arregloSalida);
?>