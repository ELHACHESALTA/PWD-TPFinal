<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    if (isset($datos[0]["imagen"]) && isset($datos["idproducto"])){
        $objAbmProducto = new AbmProducto();
        $arreglo["idproducto"] = $datos["idproducto"];
        if ($objAbmProducto->buscar($arreglo)){
            if ($datos[0]["imagen"]["type"] == "image/jpeg"){
                $archivo = "../../img/productos/" . $datos["idproducto"] . ".jpg";
                if (file_exists($archivo)){
                    unlink($archivo);
                    if (copy($datos[0]["imagen"]["tmp_name"], "../../img/productos/".$datos["idproducto"].".jpg")){
                        $respuesta["respuesta"] = "El archivo se subió correctamente";        
                    } else {
                        $respuesta["errorMsg"] = "No se pudo subir el archivo";
                    }
                } else {
                    if (copy($datos[0]["imagen"]["tmp_name"], "../../img/productos/".$datos["idproducto"].".jpg")){
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
    } else {
        $respuesta["errorMsg"] = "No se ha adjuntado ningún archivo";
    }
    echo json_encode($respuesta);
?>