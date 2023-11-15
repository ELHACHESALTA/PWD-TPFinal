<?php 
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    $objAbmRol = new AbmRol();
    $objAbmUsuarioRol = new AbmUsuarioRol();
    $arreglo["idrol"] = $datos["idrol"];
    $listaRol = $objAbmRol->buscar($arreglo);
    $arregloObjUsuarioRol = $objAbmUsuarioRol -> buscar(['idusuario' => $datos['idusuario']]);
    if (count($arregloObjUsuarioRol) == 1) {
        if ($listaRol) {
            if($objAbmUsuarioRol->modificacion($datos)){
                $respuesta["respuesta"] = "Se modificó el usuario rol correctamente!";
            } else {
                $respuesta["errorMsg"] = "No se pudo realizar la modificacion";
            }
        } else {
            $respuesta["errorMsg"] = "No existe el rol ingresado";
        }
    } elseif (count($arregloObjUsuarioRol) > 1) {
        $respuesta["errorMsg"] = "No se puede modificar debido a que existe mas de un usuariorol con el idusuario, debe ser creado una nueva relacion usuariorol";
    }
    echo json_encode($respuesta);