<?php
include_once("../configuracion.php");

$obj = new CompraItem();
/*$objCompra = new Compra();
$objCompra->setIdcompra(2);
$objCompra->cargar();
$objProducto = new Producto();
$objProducto->setIdproducto(9);
$objProducto->cargar();
$obj->setear(null, $objProducto, $objCompra, 26);*/
// prueba de insercion de compraitem
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona la compraitem con id 1 para modificar
$obj->setIdcompraitem(1);
$obj->cargar();
// prueba de modificacion de compraitem
/*$obj->setCicantidad(16);
if ($obj->modificar()){
    echo "El registro se actualizó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de eliminacion de compraitem
/*if ($obj->eliminar()){
    echo "El registro se dio de baja correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de listar de compraitem
print_r($obj->listar());