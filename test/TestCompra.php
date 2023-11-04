<?php
include_once("../configuracion.php");

$obj = new Compra();
/*$objUsuario = new Usuario();
$objUsuario->setIdusuario(1);
$objUsuario->cargar();
$obj->setear(null, null, $objUsuario, "metodo1");*/

// prueba de insercion de compra
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona la compra con id 1 para modificar
/*$obj->setIdcompra(1);
$obj->cargar();*/
// prueba de modificacion de compra
/*$obj->setMetodo("nuevo metodo");
if ($obj->modificar()){
    echo "El registro se actualizó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de eliminacion de compra
/*if ($obj->eliminar()){
    echo "El registro se dio de baja correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de listar de compra
print_r($obj->listar());