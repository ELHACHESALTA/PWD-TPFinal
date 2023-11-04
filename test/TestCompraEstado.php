<?php
include_once("../configuracion.php");

$obj = new CompraEstado();
/*$objCompra = new Compra();
$objCompra->setIdcompra(2);
$objCompra->cargar();
$objCompraEstadoTipo = new CompraEstadoTipo();
$objCompraEstadoTipo->setIdcompraestadotipo(2);
$objCompraEstadoTipo->cargar();
$obj->setear(null, $objCompra, $objCompraEstadoTipo, null, null);*/

// prueba de insercion de compraestado
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona la compraestado con id 1 para modificar
/*$obj->setIdcompraestado(1);
$obj->cargar();*/
// prueba de modificacion de compraestado
/*$obj->setCefechafin("2003-04-10 10:05:36");
if ($obj->modificar()){
    echo "El registro se actualizó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de eliminacion de compraestado
/*if ($obj->eliminar()){
    echo "El registro se dio de baja correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de listar de compraestado
print_r($obj->listar());