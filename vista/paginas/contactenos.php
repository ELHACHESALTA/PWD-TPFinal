<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Contactenos";
    $sesionInicial = new Session();
    if ($sesionInicial -> validar()) {
        include_once("../estructura/encabezadoPrivado.php");
    } else {
        $sesionInicial -> cerrar();
        include_once("../estructura/encabezadoPublico.php");
    }
?>

<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2" href="inicio.php"><i class="bi bi-arrow-90deg-left"></i></a>
<h1 class="display-5 fw-bold">Contactenos</h1>

<iframe class="w-100 h-100 border border-dark border-5 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5333.291386085813!2d-68.06443291783188!3d-38.94130071852995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x960a33ddce5aff0b%3A0xee00afc4b1e7a1d6!2sFacultad%20de%20Inform%C3%A1tica!5e0!3m2!1ses!2sar!4v1687640879450!5m2!1ses!2sar"></iframe>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h3>Dirección</h3>
                <p>Buenos Aires 1400 (Neuquén Capital)</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h3>Teléfono</h3>
                <p>+54 9 299 449-0326</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h3>Email</h3>
                <p>contacto@tiendasillones.com</p>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../estructura/pie.php");
?>