<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenu = new AbmMenu();
$respuesta = $objAbmMenu -> crearMenu($datos);
echo json_encode($respuesta);
?>