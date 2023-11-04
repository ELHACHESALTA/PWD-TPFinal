<?php

    class AbmUsuariorol{

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return usuariorol
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idusuario',$param) and array_key_exists('idrol',$param)) {
                $obj = new usuariorol();
                $objUsuario = new usuario();
                $objUsuario->setIdusuario($param["idusuario"]);
                $objUsuario->cargar();
                $objRol = new rol();
                $objRol->setIdrol($param["idrol"]);
                $objRol->cargar();
                $obj -> setear($objUsuario, $objRol);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return usuariorol
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idusuario']) && isset($param['idrol']) ) {
                $obj = new usuariorol();
                $objUsuario = new usuario();
                $objUsuario->setIdusuario($param["idusuario"]);
                $objUsuario->cargar();
                $objRol = new rol();
                $objRol->setIdrol($param["idrol"]);
                $objRol->cargar();
                $obj -> setear($objUsuario, $objRol);
            }
            return $obj;
        }

        /**
         * Corrobora que dentro del arreglo asociativo están seteados los campos claves.
         * @param array $param
         * @return boolean
         */
        private function seteadosCamposClaves($param) {
            $resp = false;
            if (isset($param['idusuario']) and isset($param["idrol"])) {
                $resp = true;
            }
            return $resp;
        }

        /**
         * Permite crear un objeto.
         * @param array $param
         */
        public function alta($param){
            $resp = false;
            //$param['Patente'] = null;
            $objUsuarioRol = $this->cargarObjeto($param);
            // verEstructura($objAuto);
            if ($objUsuarioRol != null and $objUsuarioRol->insertar()) {
                $resp = true;
            }
            return $resp;
        }

        /**
         * Permite eliminar un objeto.
         * @param array $param
         * @return boolean
         */
        public function baja($param) {
            $resp = false;
            if ($this -> seteadosCamposClaves($param)) {
                $objUsuarioRol = $this -> cargarObjetoConClave($param);
                if ($objUsuarioRol != null and $objUsuarioRol -> eliminar()) {
                    $resp = true;
                }
            }
            return $resp;
        }
        // duda sobre si se puede modificar
        /**
         * Permite modificar un objeto.
         * @param array $param
         * @return boolean
         */
        /*
        public function modificacion($param){
            $resp = false;
            if ($this -> seteadosCamposClaves($param)) {
                $objRol = $this -> cargarObjeto($param);
                if ($objRol != null and $objRol -> modificar()) {
                    $resp = true;
                }
            }
            return $resp;
        }
        */

        /**
         * Permite buscar un objeto.
         * @param array $param
         * @return boolean
         */
        public function buscar($param) {
            $where = " true ";
            if ($param <> null) {
                if (isset($param['idusuario'])) {
                    $where .= " and idusuario =" . $param['idusuario'];
                }
                if (isset($param['idrol'])) {
                    $where .= " and idrol =" . $param['idrol'];
                }
            }
            $objUsuarioRol = new usuariorol();
            $arreglo = $objUsuarioRol -> listar($where);
            return $arreglo;
        }
    }

?>