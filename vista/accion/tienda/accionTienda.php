<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
    if (isset($datos['idproducto']) && isset($datos['cantidad'])){
        $objAbmCompra = new AbmCompra();
    }else{
        header("Location:../../paginas/productos.php?idproducto=" . $datos['idproducto']."&error=1"); 
    }
?>