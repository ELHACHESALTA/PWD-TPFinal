<?php
include_once("../configuracion.php");

$obj = new Producto();
$obj->setear(null, "producto prueba 1", "detalle del prod prueba 1", "16", 125000, null);

// prueba de insercion de producto
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// se selecciona el producto con id 9 para modificar
/*$obj->setIdproducto(9);
$obj->cargar();*/
// prueba de modificacion de producto
/*$obj->setPronombre("nuevo nombre modificado");
$obj->setProcantstock(155);
if ($obj->modificar()){
    echo "El registro se actualizó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de eliminacion de producto
/*if ($obj->eliminarLogico()){
    echo "El registro se dio de baja correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de listar de producto
print_r($obj->listar());