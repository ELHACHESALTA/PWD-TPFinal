<?php
include_once("../../configuracion.php");
$tituloPagina = "¿Quienes Somos?";
$sesionInicial = new Session();
if ($sesionInicial -> validar()) {
    include_once("../estructura/encabezadoPrivado.php");
} else {
    $sesionInicial -> cerrar();
    include_once("../estructura/encabezadoPublico.php");
}
?>

<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2" href="inicio.php"><i class="bi bi-arrow-90deg-left"></i></a>
<h1 class="display-5 pb-3 fw-bold">¿Quienes Somos?</h1>
<p class="lead">Este proyecto fue creado por el Grupo 3.1, integrado por:</p>

<table class='table table-striped table-dark'>
    <thead>
        <tr>
            <th scope='col'>Alumno</th>
            <th scope='col'>Legajo</th>
            <th scope='col'>Mail</th>
            <th scope='col'>GitHub</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope='row'>Aguero Mendez, Guillermo Andrés</th>
            <td>FAI-3844</td>
            <td>guillermo.aguero@est.fi.uncoma.edu.ar</td>
            <td><a href="https://github.com/guillermoagueronqn" class="link-light">guillermoagueronqn</a></td>
        </tr>
        <tr>
            <th scope='row'>Herrera, Julio Federico</th>
            <td>FAI-4285</td>
            <td>julio.herrera@est.fi.uncoma.edu.ar</td>
            <td><a href="https://github.com/ELHACHESALTA" class="link-light">ELHACHESALTA</a></td>
        </tr>
    </tbody>
</table>

<p class="lead">Por medio de este trabajo final se logran integrar los conceptos vistos a lo largo de toda la cursada de la materia Programación Web Dinámica (2023). Y para ello se implementó una tienda On-Line que consta de 2 vistas: una pública y otra privada; y a su vez se siguió una serie de pautas que se explican a detalle en el apartado de <a href="../paginas/acercaDe.php" class="link-dark fw-bold">Acerca De</a>.</p>


<?php
include_once("../estructura/pie.php");
?>