<?php
    include_once "../../../configuracion.php";
    $objAbmUsuario = new AbmUsuario();
    $arregloSalida = $objAbmUsuario -> listarCompraEstadoCliente();
    echo json_encode($arregloSalida);
?> 