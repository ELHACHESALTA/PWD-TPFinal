<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Página Segura";
    include_once("../estructura/encabezadoPrivado.php");

    if (isset($datos['idrol'])) {
        echo "<h1 class='display-5 pb-3 fw-bold'>Ha cambiado de rol correctamente.</h1>";
    } else {
        echo "<h1 class='display-5 pb-3 fw-bold'>Ha iniciado sesión correctamente!</h1>";
    }
?>

<?php
    include_once("../estructura/pie.php");
?>