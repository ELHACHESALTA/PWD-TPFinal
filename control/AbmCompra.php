<?php

    class AbmCompra{

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return Compra
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idcompra',$param) and array_key_exists('cofecha',$param) and array_key_exists('idusuario',$param) and array_key_exists('metodo',$param)) {
                $obj = new Compra();
                $objUsuario = new Usuario();
                $objUsuario->setIdusuario($param["idusuario"]);
                $objUsuario->cargar();
                $obj -> setear($param["idusuario"], $param["cofecha"], $objUsuario, $param["metodo"]);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return Compra
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idcompra'])) {
                $obj = new Compra();
                $obj -> setear($param["idcompra"], null, null, null);
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
            if (isset($param['idcompra'])) {
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
            $param['idcompra'] = null;
            $objCompra = $this->cargarObjeto($param);
            if ($objCompra != null and $objCompra->insertar()) {
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
                $objCompra = $this -> cargarObjetoConClave($param);
                if ($objCompra != null and $objCompra -> eliminar()) {
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
                $objCompra = $this -> cargarObjeto($param);
                if ($objCompra != null and $objCompra -> modificar()) {
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
                if (isset($param['idcompra'])) {
                    $where .= " and idcompra =" . $param['idcompra'];
                }
                if (isset($param['cofecha'])) {
                    $where .= " and cofecha ='" . $param['cofecha'] . "'";
                }
                if (isset($param['idusuario'])) {
                    $where .= " and idusuario =" . $param['idusuario'];
                }
                if (isset($param['metodo'])) {
                    $where .= " and metodo ='" . $param['metodo'] . "'";
                }
            }
            $objCompra = new Compra();
            $arreglo = $objCompra -> listar($where);
            return $arreglo;
        }
    }

?>