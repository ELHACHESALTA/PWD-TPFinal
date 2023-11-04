<?php
include_once("../configuracion.php");

$obj = new UsuarioRol();

// se crean Usuario y Rol para luego hacer el UsuarioRol
/*$objUsuario = new Usuario();
$objUsuario->setIdusuario(1);
$objUsuario->cargar();
$objRol = new Rol();
$objRol->setIdrol(2);
$objRol->cargar();
$obj->setear($objUsuario, $objRol);*/
// prueba de insercion de UsuarioRol
/*if ($obj->insertar()){
    echo "El registro se insertó correctamente!";
} else {
    echo $obj->getmensajeoperacion();
}*/

// NO SE MODIFICA UsuarioRol

// se selecciona el objeto UsuarioRol hecho mas arriba
/*$obj->setObjUsuario($objUsuario);
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