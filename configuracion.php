<?php

    date_default_timezone_set('America/Argentina/Cordoba');

    header("Content-Type: text/html; charset=utf-8");
    header ("Cache-Control: no-cache, must-revalidate ");

    // Carpeta princpial del proyecto.
    $PROYECTO = "PWD-TPFinal";

    // Variable que almacena el directorio del proyecto.
    $ROOT = $_SERVER["DOCUMENT_ROOT"] . "/PWD-TPFinal/";

    include_once($ROOT . "util/funciones.php");

    $_SESSION["ROOT"] = $ROOT;

?>