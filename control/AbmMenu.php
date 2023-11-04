<?php

    class AbmMenu {

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return Menu
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idmenu',$param) and array_key_exists('menombre',$param) and array_key_exists('medescripcion',$param) and array_key_exists('idpadre',$param) and array_key_exists('medeshabilitado',$param)) {
                $obj = new Menu();
                $objMenuPadre = new Menu();
                $objMenuPadre->setIdmenu($param["idpadre"]);
                $objMenuPadre->cargar();
                $obj -> setear($param['idmenu'], $param['menombre'], $param['medescripcion'], $objMenuPadre, $param["medeshabilitado"]);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return Menu
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idmenu']) ) {
                $obj = new Menu();
                $obj -> setear($param['idmenu'], null, null, null, null);
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
            if (isset($param['idmenu'])) {
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
            $param['idmenu'] = null;
            $objMenu = $this->cargarObjeto($param);
            if ($objMenu != null and $objMenu->insertar()) {
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
                $objMenu = $this -> cargarObjetoConClave($param);
                if ($objMenu != null and $objMenu -> eliminar()) {
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
                $objMenu = $this -> cargarObjeto($param);
                if ($objMenu != null and $objMenu -> modificar()) {
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
                if (isset($param['idmenu'])) {
                    $where .= " and idmenu =" . $param['idmenu'];
                }
                if (isset($param['menombre'])) {
                    $where .= " and menombre ='" . $param['menombre'] . "'";
                }
                if (isset($param['medescripcion'])) {
                    $where .= " and medescripcion ='" . $param['medescripcion'] . "'";
                }
                if (isset($param['idpadre'])) {
                    $where .= " and idpadre =" . $param['idpadre'];
                }
                if (isset($param['medeshabilitado'])) {
                    $where .= " and medeshabilitado ='" . $param['medeshabilitado'] . "'";
                }
            }
            $objMenu = new Menu();
            $arreglo = $objMenu -> listar($where);
            return $arreglo;
        }
    }

?>