<?php
    include_once "../../configuracion.php";
    $datos = data_submitted();
    if (isset($datos['usnombre']) && isset($datos['uspass']) && isset($datos['usmail'])) {
        $objAbmUsuario = new AbmUsuario();
        $usuarioExiste = $objAbmUsuario -> buscar(['usnombre' => $datos['usnombre']]);
        if ($usuarioExiste == []) {
            $datos['usdeshabilitado'] = NULL;
            if ($objAbmUsuario -> alta($datos)) {
                $datos['idusuario'] = ($objAbmUsuario -> buscar(['usnombre' => $datos['usnombre']]))[0] -> getIdusuario();
                $datos['idrol'] = 3;
                $objAbmUsuarioRol = new AbmUsuarioRol();
                if ($objAbmUsuarioRol -> alta($datos)) {
                    header('Location:../paginas/login.php?error=Acaba de registrarse, debe iniciar sesion.');
                } else {
                    header('Location:../paginas/registrarse.php');
                }
            }
        } else {
            header('Location:../paginas/login.php?error=Nombre de usuario existente, inicie sesión.');
        }
    }
?>