<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmUsuario = new AbmUsuario(); 
    $respuesta = $objAbmUsuario -> editarUsuarioActual($datos);
    echo json_encode($respuesta);
?>