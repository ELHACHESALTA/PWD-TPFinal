<?php 
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmUsuarioRol = new AbmUsuarioRol();
    $respuesta = $objAbmUsuarioRol -> editarUsuarioRol($datos);
    echo json_encode($respuesta);
?>