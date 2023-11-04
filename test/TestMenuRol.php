<?php
include_once("../configuracion.php");

$obj = new MenuRol();

// se crean menu y rol para luego hacer el menuRol
/*$objMenu = new Menu();
$objMenu->setIdmenu(0);
$objMenu->cargar();
$objRol = new Rol();
$objRol->setIdrol(2);
$objRol->cargar();*/
// prueba de insercion de menuRol
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// NO SE MODIFICA MenuRol

// se selecciona el objeto MenuRol hecho mas arriba
/*$obj->setObjMenu($objMenu);
$obj->setObjRol($objRol);
$obj->cargar();*/
// prueba de eliminacion de MenuRol
/*if ($obj->eliminar()){
    echo "El registro se dio de baja correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// prueba de listar de menu
print_r($obj->listar());