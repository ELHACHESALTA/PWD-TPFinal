<?php
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmMenuRol = new AbmMenuRol();
if($objAbmMenuRol->baja($datos)){
    $respuesta = "se eliminó correctamente el MenuRol";
} else {
    $respuesta = "no se pudo eliminar el MenuRol";
}

echo json_encode($respuesta);
?>