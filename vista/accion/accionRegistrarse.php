<?php
    include_once "../../configuracion.php";
    $datos = data_submitted();
    if (isset($datos['usnombre']) && isset($datos['uspass']) && isset($datos['usmail'])) {
        $objAbmUsuario = new AbmUsuario();
        $direccion = $objAbmUsuario -> registrarse($datos);
        header ($direccion);
    }
?>