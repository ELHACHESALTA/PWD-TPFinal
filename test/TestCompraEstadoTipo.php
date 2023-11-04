<?php
include_once("../configuracion.php");

$obj = new CompraEstadoTipo();
//$obj->setear(2, 'aceptada', 'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 ');

// prueba de insercion de compraestadotipo
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona la compraestadotipo con id 1 para modificar
//$obj->setIdcompraestadotipo(1);
//$obj->cargar();
// prueba de modificacion de compraestadotipo
/*$obj->setCetdetalle("nuevo detalle para el id 1");
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