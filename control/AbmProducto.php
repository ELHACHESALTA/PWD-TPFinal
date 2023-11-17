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
                if ($objProducto != null and $objProducto -> cambiarEstado()) {
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

        public function crearProducto($param) {
            $param["prodeshabilitado"] = null;
            $param["procantstock"] = 0;
            $param["proprecio"] = intval($param["proprecio"]);
            if ($param["proprecio"] > 0){
                if($this->alta($param)){
                    $respuesta["respuesta"] = "Se dio de alta el producto correctamente";
                } else {
                    $respuesta["errorMsg"] = "No se pudo realizar el alta del producto";
                }    
            } else {
                $respuesta["errorMsg"] = "El precio debe ser mayor a 0";
            }
            return $respuesta;
        }

        public function cargaDeImagen($param) {
            $arreglo["idproducto"] = $param["idproducto"];
            if ($this->buscar($arreglo)){
                if ($param[0]["imagen"]["type"] == "image/jpeg"){
                    $archivo = "../../img/productos/" . $param["idproducto"] . ".jpg";
                    if (file_exists($archivo)){
                        unlink($archivo);
                        if (copy($param[0]["imagen"]["tmp_name"], "../../img/productos/".$param["idproducto"].".jpg")){
                            $respuesta["respuesta"] = "El archivo se subió correctamente";        
                        } else {
                            $respuesta["errorMsg"] = "No se pudo subir el archivo";
                        }
                    } else {
                        if (copy($param[0]["imagen"]["tmp_name"], "../../img/productos/".$param["idproducto"].".jpg")){
                            $respuesta["respuesta"] = "El archivo se subió correctamente";        
                        } else {
                            $respuesta["errorMsg"] = "No se pudo subir el archivo";
                        }
                    }
                } else {
                    $respuesta["errorMsg"] = "El archivo debe ser .jpg";
                }
            } else {
                $respuesta["errorMsg"] = "No existe ningún producto con el id ingresado";
            }
            return $respuesta;
        }

        public function editarProducto($param) {
            $arreglo["idproducto"] = $param["idproducto"];
            $listaProductos = $this->buscar($arreglo);
            $param["prodeshabilitado"] = $listaProductos[0]->getProdeshabilitado();
            $param["procantstock"] = $listaProductos[0]->getProcantstock();
            if ($param["proprecio"] > 0){
                if($this->modificacion($param)){
                    $respuesta["respuesta"] = "Se modificó el producto correctamente";
                } else {
                    $respuesta["errorMsg"] = "No se pudo realizar la modificación del producto";
                }
            } else {
                $respuesta["errorMsg"] = "El precio debe ser mayor a 0";
            }
            return $respuesta;
        }

        public function editarStock($param) {
            $arreglo["idproducto"] = $param["idproducto"];
            $listaProductos = $this->buscar($arreglo);
            $param["proprecio"] = $listaProductos[0]->getProprecio();
            $param["prodeshabilitado"] = $listaProductos[0]->getProdeshabilitado();
            $param["procantstock"] = intval($param["procantstock"]);
            if ($param["procantstock"] > 0){
                if($this->modificacion($param)){
                    $respuesta["respuesta"] = "Se modificó el stock correctamente";
                } else {
                    $respuesta["errorMsg"] = "No se pudo realizar la modificacion del stock";
                }    
            } else {
                $respuesta["errorMsg"] = "El stock debe ser mayor a 0";
            }
            return $respuesta;
        }

        public function listarProductos() {
            $listaProductos = $this->buscar(null);
            $arregloSalida = array(); 
            foreach ($listaProductos as $elemento) {
                $nuevoElemento['idproducto'] = $elemento->getIdproducto();
                $nuevoElemento['pronombre'] = $elemento->getPronombre();
                $nuevoElemento['prodetalle'] = $elemento->getProdetalle();
                $nuevoElemento['proprecio'] = $elemento->getProprecio();
                if ($elemento->getProdeshabilitado() == null){
                    $nuevoElemento["prodeshabilitado"] = "Habilitado";
                } else {
                    $nuevoElemento["prodeshabilitado"] = "Deshabilitado (" . $elemento->getProdeshabilitado() . ")";
                }
                $caminoArchivo = "../../img/productos/".$elemento->getIdproducto().".jpg";
                if (file_exists($caminoArchivo)){
                    $nuevoElemento["imagen"] = "<img src='../img/productos/" . $elemento->getIdproducto() . ".jpg' width='100px' height='66px'>";
                } else {
                    $nuevoElemento["imagen"] = "Sin Imagen";
                }
                
                array_push($arregloSalida, $nuevoElemento);
            }
            return $arregloSalida;
        }

        public function listarStock() {
            $listaProductos = $this->buscar(null);
            $arregloSalida = array(); 
            foreach ($listaProductos as $elemento) {
                $nuevoElemento['idproducto'] = $elemento->getIdproducto();
                $nuevoElemento['pronombre'] = $elemento->getPronombre();
                $nuevoElemento['prodetalle'] = $elemento->getProdetalle();
                $nuevoElemento['procantstock'] = $elemento->getProcantstock();
                array_push($arregloSalida, $nuevoElemento);
            }
            return $arregloSalida;
        }
    }

?>