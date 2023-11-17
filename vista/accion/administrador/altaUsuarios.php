<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$respuesta = $objAbmUsuario -> crearUsuario($datos);
echo json_encode($respuesta); 