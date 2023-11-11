<?php
    include_once "../../configuracion.php";
    $datos = data_submitted();
    if (isset($datos['usnombre']) && isset($datos['uspass']) && isset($datos['usmail'])) {
        $resp = false;
        $objAbmUsuario = new AbmUsuario();
        $busqueda['usnombre'] = $datos['usnombre'];
        $usuarioExiste = $objAbmUsuario -> buscar($busqueda);
        if (!$usuarioExiste) {
            $objSession = new Session();
            $objSession -> iniciar($datos["usnombre"], md5($datos["uspass"]));
            $datos['uspass'] = md5($datos['uspass']);
            $datos['usdeshabilitado'] = NULL;
            if ($objAbmUsuario -> alta($datos)) {
                $arregloUsuarios = $objAbmUsuario -> buscar($datos);
                $datos['idusuario'] = $arregloUsuarios[0] -> getIdusuario();
                $datos['idrol'] = 3;
                $objAbmUsuarioRol = new AbmUsuarioRol();
                if ($objAbmUsuarioRol -> alta($datos)) {
                    header('Location:../paginas/login.php?error=Acaba de registrarse, debe iniciar sesion.');
                } else {
                    header('Location:../paginas/registrarse.php');
                }
            }
        }
    }
?>