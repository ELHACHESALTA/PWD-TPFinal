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

        // if (!$usuarioExisteConMail && !$usuarioExisteSinMail) { // si no existe el usuario con o sin mail
        //     $resp = $this->alta($datos);
        //     if ($resp['respuesta']) { // si el usuario se pudo insertar en bd
        //         $datos['uspass'] = md5($datos['uspass']);
        //         $arrUser = $this->buscar($datos);
        //         if (count($arrUser) > 0) {
        //             $objUsuario = $arrUser[0];
        //             $idUsuario = $objUsuario->getIdusuario();
        //             $datos['idusuario'] = $idUsuario;
        //             $datos['idrol'] = 3;
        //             $abmUsRol = new abmUsuariorol();
        //             $resp = $abmUsRol->alta($datos);
        //             if ($resp) {
        //                 $reg = "ALTA USUARIO-ROL EXITOSA.";
        //                 $retorno['enlace'] = "Location:../../login.php?reg=" . $reg;
        //             } else {
        //                 $respBaja = $this->baja($datos['idusuario']); // si no pudo insertar en usuariorol pero si en usuario, borro el usuario
        //                 $reg = "No se pudo registrar el usuario cliente.";
        //                 $retorno['enlace'] = "Location:../../registro.php?reg=" . $reg;
        //             }
        //         }
        //     } else {
        //         $reg = "No se pudo guardar el usuario. " . $resp['errorMsg'];
        //         $retorno['enlace'] = "Location:../../registro.php?reg=" . $reg;
        //     }
        // } else {
        //     $reg = "El usuario ya existe";
        //     $retorno['enlace'] = "Location:../../registro.php?reg=" . $reg;
        // }
        // return $retorno;




    //     $objAbmUsuario = new AbmUsuario();
    //     $retorno = $abmUs->registroUs($datos);
    //     if (isset($retorno['enlace'])){
    //         header($retorno['enlace']);
    //     }
    // } else {
    //     $reg = "Faltan datos o son incorrectos.";
    //     header("Location:../../registro.php?reg=" . $reg);
    // }
?>