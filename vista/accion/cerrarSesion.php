<?php
    include_once("../../configuracion.php");
    $sesionCierre = new Session();
    $sesionCierre -> cerrar();
    header('Location:../paginas/inicio.php');
?>