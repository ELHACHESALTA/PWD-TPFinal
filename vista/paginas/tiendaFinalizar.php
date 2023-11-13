<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Finalizar Compra";
    include_once("../estructura/encabezadoPrivado.php");
?>

<?php
    $datos = data_submitted();
    if ($datos['transaccion'] == "exito"){
        echo "<div>Operación exitosa. Se esta revisando su compra.</div>";
    }elseif($datos['transaccion'] == "fallo"){
        echo "<div>Hubo un error con la compra.</div>";
    }elseif($datos['transaccion'] == "stock"){
        echo "<div>Uno de los productos no tiene stock suficiente.</div>";
    }
?>

<?php
    include_once("../estructura/pie.php");
?>