<?php
    include_once ("../../../configuracion.php");
    $datos = data_submitted();
    if (isset($datos['idcompraitem'])){
        $objAbmItem = new AbmCompraitem();
        $objAbmItem -> baja(['idcompraitem' => $datos['idcompraitem']]);
    }
    header("Location:../../paginas/carrito.php");
?>