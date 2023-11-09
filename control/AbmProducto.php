<?php

    class AbmProducto {

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return Producto
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idproducto',$param) and array_key_exists('pronombre',$param) and array_key_exists('prodetalle',$param) and array_key_exists('procantstock',$param) and array_key_exists('proprecio',$param) and array_key_exists('prodeshabilitado',$param)) {
                $obj = new Producto();
                $obj -> setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], $param["proprecio"], $param["prodeshabilitado"]);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return Producto
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idproducto']) ) {
                $obj = new Producto();
                $obj -> setear($param['idproducto'], null, null, null, null, null);
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
            if (isset($param['idproducto'])) {
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
            $param['idproducto'] = null;
            $objProducto = $this->cargarObjeto($param);
            if ($objProducto != null and $objProducto->insertar()) {
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
                $objProducto = $this -> cargarObjetoConClave($param);
                if ($objProducto != null and $objProducto -> eliminarLogico()) {
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
                $objProducto = $this -> cargarObjeto($param);
                if ($objProducto != null and $objProducto -> modificar()) {
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
                if (isset($param['idproducto'])) {
                    $where .= " and idproducto =" . $param['idproducto'];
                }
                if (isset($param['pronombre'])) {
                    $where .= " and pronombre ='" . $param['pronombre'] . "'";
                }
                if (isset($param['prodetalle'])) {
                    $where .= " and prodetalle ='" . $param['prodetalle'] . "'";
                }
                if (isset($param['procantstock'])) {
                    $where .= " and procantstock =" . $param['procantstock'];
                }
                if (isset($param['proprecio'])) {
                    $where .= " and proprecio =" . $param['proprecio'];
                }
                if (isset($param['prodeshabilitado'])) {
                    $where .= " and prodeshabilitado ='" . $param['prodeshabilitado'] . "'";
                }
            }
            $objProducto = new Producto();
            $arreglo = $objProducto -> listar($where);
            return $arreglo;
        }
    }

?>