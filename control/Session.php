<?php

class Session {
    // Constructor que Inicia la sesión.
    public function __construct(){
        session_start();
    }

    // Actualiza las variables de sesión con los valores ingresados.
    public function iniciar($nombreUsuario, $psw){
        $resp = false;
        $objAbmUsuario = new AbmUsuario();
        $sesionActual['usnombre'] = $nombreUsuario;
        $sesionActual['uspass'] = $psw;
        $sesionActual['usdeshabilitado'] = null;
        $objSesionActual = $objAbmUsuario -> buscar($sesionActual);
        if ($objSesionActual) {
            $usuarioSesionActual = $objSesionActual[0];
            if ($usuarioSesionActual->getUsdeshabilitado() == NULL){
                $_SESSION['idusuario'] = $usuarioSesionActual -> getIdusuario();
                $resp = true;
            } else {
                $this -> cerrar();
            }
        } else {
            $this -> cerrar();
        }
        return $resp;
    }

    // Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.
    public function validar(){
        $resp = false;
        if($this -> activa() && isset($_SESSION['idusuario'])) {
            $resp = true;
        }
        return $resp;
    }

    // Devuelve true o false si la sesión está activa o no. 
    public function activa(){
        $resp = false;
        if (session_status() == PHP_SESSION_ACTIVE){
            $resp = true;
        }
        return $resp;
    }

    // Devuelve el usuario logeado.
    public function getUsuario(){
        $objUsuario = null;
        if ($this -> validar()) {
            $objAbmUsuario = new AbmUsuario();
            if ($listaUsuarios = $objAbmUsuario->buscar($_SESSION)){
                $objUsuario = $listaUsuarios[0];
            }
        }
        return $objUsuario;
    }

    // Devuelve el rol del usuario logeado.
    public function getRol(){
        $listaRoles = null;
        if ($this -> validar()) {
            $objAbmUsuarioRol = new AbmUsuarioRol();
            if ($listaUsuarioRol = $objAbmUsuarioRol->buscar($_SESSION['idusuario'])){
                $listaRoles = $listaUsuarioRol;
            }
        }
        return $listaRoles;
    }

    //  Cierra la sesión actual.
    public function cerrar(){
        session_destroy();
    }
}

?>