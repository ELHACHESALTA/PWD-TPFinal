<?php

    class AbmMenuRol{

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return MenuRol
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idmenu',$param) and array_key_exists('idrol',$param)) {
                $obj = new MenuRol();
                $objMenu = new Menu();
                $objMenu->setIdmenu($param["idmenu"]);
                $objMenu->cargar();
                $objRol = new Rol();
                $objRol->setIdrol($param["idrol"]);
                $objRol->cargar();
                $obj -> setear($objMenu, $objRol);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return MenuRol
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idmenu']) && isset($param['idrol']) ) {
                $obj = new MenuRol();
                $objMenu = new Menu();
                $objMenu->setIdmenu($param["idmenu"]);
                $objMenu->cargar();
                $objRol = new Rol();
                $objRol->setIdrol($param["idrol"]);
                $objRol->cargar();
                $obj -> setear($objMenu, $objRol);
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
            if (isset($param['idmenu']) and isset($param["idrol"])) {
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
            $objMenuRol = $this->cargarObjeto($param);
            // verEstructura($objAuto);
            if ($objMenuRol != null and $objMenuRol->insertar()) {
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
                $objMenuRol = $this -> cargarObjetoConClave($param);
                if ($objMenuRol != null and $objMenuRol -> eliminar()) {
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
                if (isset($param['idmenu'])) {
                    $where .= " and idmenu =" . $param['idmenu'];
                }
                if (isset($param['idrol'])) {
                    $where .= " and idrol =" . $param['idrol'];
                }
            }
            $objMenuRol = new MenuRol();
            $arreglo = $objMenuRol -> listar($where);
            return $arreglo;
        }
    }

?>