<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenuRol = new AbmMenuRol();
$respuesta = $objAbmMenuRol -> crearMenuRol($datos);
echo json_encode($respuesta);
?>