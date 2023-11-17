<?php
    include_once ("../../../configuracion.php");
    $objAbmCompra = new AbmCompra();
    $resp = $objAbmCompra -> cancelarCompra();
    header("Location:../../paginas/tienda.php");
?>