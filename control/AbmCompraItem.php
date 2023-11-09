<?php

    class AbmCompraItem {

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return CompraItem
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idcompraitem',$param) and array_key_exists('idproducto',$param) and array_key_exists('idcompra',$param) and array_key_exists('cicantidad',$param)) {
                $obj = new CompraItem();
                $objProducto = new Producto();
                $objProducto->setIdproducto($param["idproducto"]);
                $objProducto->cargar();
                $objCompra = new Compra();
                $objCompra->setIdcompra($param["idcompra"]);
                $objCompra->cargar();
                $obj -> setear($param['idcompraitem'], $objProducto, $objCompra, $param["cicantidad"]);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return CompraItem
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idcompraitem']) ) {
                $obj = new CompraItem();
                $obj -> setear($param['idcompraitem'], null, null, null);
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
            if (isset($param['idcompraitem'])) {
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
            $param['idcompraitem'] = null;
            $objCompraItem = $this->cargarObjeto($param);
            if ($objCompraItem != null and $objCompraItem->insertar()) {
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
                $objCompraItem = $this -> cargarObjetoConClave($param);
                if ($objCompraItem != null and $objCompraItem -> eliminar()) {
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
                $objCompraItem = $this -> cargarObjeto($param);
                if ($objCompraItem != null and $objCompraItem -> modificar()) {
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
                if (isset($param['idcompraitem'])) {
                    $where .= " and idcompraitem =" . $param['idcompraitem'];
                }
                if (isset($param['idproducto'])) {
                    $where .= " and idproducto =" . $param['idproducto'];
                }
                if (isset($param['idcompra'])) {
                    $where .= " and idcompra =" . $param['idcompra'];
                }
                if (isset($param['cicantidad'])) {
                    $where .= " and cicantidad =" . $param['cicantidad'];
                }
            }
            $objCompraItem = new CompraItem();
            $arreglo = $objCompraItem -> listar($where);
            return $arreglo;
        }
    }

?>