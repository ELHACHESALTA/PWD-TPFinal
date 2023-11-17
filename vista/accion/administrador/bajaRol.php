<?php 
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmRol = new AbmRol(); 
    $respuesta = $objAbmRol -> eliminarRol($datos);
    echo json_encode($respuesta);
?>