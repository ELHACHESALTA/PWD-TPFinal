<?php
include_once("../configuracion.php");

$obj = new Rol();
//$obj->setear(null, "esta es la prueba del rol nro 2");

// prueba de insercion de menu
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona el menu con id 0 para modificar
//$obj->setIdrol(2);
//$obj->cargar();
// prueba de modificacion de menu
/*$obj->setRodescripcion("nueva descripcion de menu con id 1 modificada");
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