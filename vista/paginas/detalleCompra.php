<?php
include_once("../../configuracion.php");
$tituloPagina = "Tienda de Sillones";
$sesionInicial = new Session();
if ($sesionInicial -> validar()) {
    include_once("../estructura/encabezadoPrivado.php");
} else {
    $sesionInicial -> cerrar();
    include_once("../estructura/encabezadoPublico.php");
}
$datos = data_submitted();
if ($datos["idrol"] == 1){
    echo '<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2" href="gestionCompras.php"><i class="bi bi-arrow-90deg-left"></i></a>';
} elseif ($datos["idrol"] == 3){
    echo '<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2" href="seguimiento.php"><i class="bi bi-arrow-90deg-left"></i></a>';
}



?>
<table id="detalleCompra" class="easyui-datagrid" style="width:800px"
        toolbar="#toolbarDetalleCompra"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="foto" width="15">N°</th>
            <th field="pronombre" width="85">Nombre del Producto</th>
            <th field="cicantidad" width="50">Cantidad</th>
            <th field="proprecio" width="107">Precio Unitario</th>
            <th field="preciototal" width="90">Precio Total</th>
        </tr>
    </thead>
    <tbody>
<?php
    $arreglo["idcompra"] = $datos["idcompra"];
    $objAbmCompraItem = new AbmCompraItem();
    $arregloItems = $objAbmCompraItem->buscar($arreglo);
    $totalCompra = 0;
    foreach ($arregloItems as $compraItem){
        echo "<tr><td>foto</td>";
        echo "<td>".$compraItem->getObjProducto()->getPronombre()."</td>";
        echo "<td>".$compraItem->getCicantidad()."</td>";
        echo "<td>".$compraItem->getObjProducto()->getProprecio()."</td>";
        $precioTotalProducto = $compraItem->getCicantidad()*$compraItem->getObjProducto()->getProprecio();
        echo "<td>".$precioTotalProducto."</td></tr>";
        $totalCompra = $totalCompra + $precioTotalProducto;
    }
    echo "<tr><td></td><td></td><td></td><td>Precio Total de la Compra:</td>
    <td>".$totalCompra."</td></tr>";
    echo "</tbody></table>";
?>
<?php
include_once("../estructura/pie.php");
?>