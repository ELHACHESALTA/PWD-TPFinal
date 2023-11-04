<?php

    class AbmUsuario {

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return Usuario
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idusuario',$param) and array_key_exists('usnombre',$param) and array_key_exists('uspass',$param) and array_key_exists('usmail',$param) and array_key_exists('usdeshabilitado',$param)) {
                $obj = new Usuario();
                $obj -> setear($param['idusuario'], $param['usnombre'], $param['uspass'], $param['usmail'], $param["usdeshabilitado"]);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return Usuario
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idusuario']) ) {
                $obj = new Usuario();
                $obj -> setear($param['idusuario'], null, null, null, null);
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
            if (isset($param['idusuario'])) {
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
            $param['idusuario'] = null;
            $objUsuario = $this->cargarObjeto($param);
            if ($objUsuario != null and $objUsuario->insertar()) {
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
                $objUsuario = $this -> cargarObjetoConClave($param);
                if ($objUsuario != null and $objUsuario -> eliminar()) {
                    $resp = true;
                }
            }
            return $resp;
        }

        /**
         * Permite modificar un objeto.
         * @param array $param
         * @return boolean
         */
        public function modificacion($param){
            $resp = false;
            if ($this -> seteadosCamposClaves($param)) {
                $objUsuario = $this -> cargarObjeto($param);
                if ($objUsuario != null and $objUsuario -> modificar()) {
                    $resp = true;
                }
            }
            return $resp;
        }

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
                if (isset($param['usnombre'])) {
                    $where .= " and usnombre ='" . $param['usnombre'] . "'";
                }
                if (isset($param['uspass'])) {
                    $where .= " and uspass ='" . $param['uspass'] . "'";
                }
                if (isset($param['usmail'])) {
                    $where .= " and usmail ='" . $param['usmail'] . "'";
                }
                if (isset($param['usdeshabilitado'])) {
                    $where .= " and usdeshabilitado ='" . $param['usdeshabilitado'] . "'";
                }
            }
            $objUsuario = new Usuario();
            $arreglo = $objUsuario -> listar($where);
            return $arreglo;
        }
    }

?>