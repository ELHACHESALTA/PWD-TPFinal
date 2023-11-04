<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Página Segura";
    include_once("../estructura/encabezadoPrivado.php");

    // Esto está solamente para que se cierre sesión hasta que se implemente el botón de cerrar sesión en encabezadoPrivado.php
    $objSession = new Session();
    $objSession->cerrar();
    // Luego borrar lo de arriba
?>

<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start" href="../paginas/login.php"><i class="bi bi-arrow-90deg-left"></i></a>
<h1 class="fw-bold">Ha iniciado sesión correctamente!</h1>

<?php
    include_once("../estructura/pie.php");
?>