<?php
include_once("../configuracion.php");

$obj = new Usuario();
//$obj->setear(null, "juan gonzalez", "juan123", "juan@gmail.com", null);

// prueba de insercion de menu
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona el usuario con id 1 para modificar
/*$obj->setIdusuario(1);
$obj->cargar();*/
// prueba de modificacion de menu
/*$obj->setUsnombre("pedro Perez");
if ($obj->modificar()){
    echo "El registro se actualizó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de eliminacion de menu
/*if ($obj->eliminar()){
    echo "El registro se dio de baja correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de listar de menu
//print_r($obj->listar());