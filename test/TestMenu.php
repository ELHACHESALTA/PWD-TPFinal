<?php
include_once("../configuracion.php");

$obj = new Menu();
$obj->setear(null, "nombrePruebaMenu", "esta es la descripcion de la prueba", null, null);

// prueba de insercion de menu
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona el menu con id 0 para modificar
//$obj->setIdmenu(0);
//$obj->cargar();
// prueba de modificacion de menu
/*$obj->setMedescripcion("nueva descripcion de menu con id 0");
$obj->setMedeshabilitado("null");
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
print_r($obj->listar());