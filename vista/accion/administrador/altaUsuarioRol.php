<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuarioRol = new AbmUsuarioRol();
$respuesta = $objAbmUsuarioRol -> crearUsuarioRol($datos);
echo json_encode($respuesta);