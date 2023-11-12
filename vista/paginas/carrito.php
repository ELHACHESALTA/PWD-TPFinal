<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Seguimiento";
    include_once("../estructura/encabezadoPrivado.php");

    if (isset($arregloSubMenu)) {
        $i = 0;
        $subMenuDeshabilitado = false;
        while (($i < count($arregloSubMenu)) && (!$subMenuDeshabilitado)) {
            $subMenuActual = $arregloSubMenu[$i];
            // Verifica que el submenú se encuentre habilitado.
            if ($subMenuActual -> getMedeshabilitado() != 'null') {
                $subMenuDeshabilitado = true;
            }
            $i++;
        }
        $i = 0;
        $existeSubMenu = false;
        while (($i < count($arregloSubMenu)) && (!$existeSubMenu)) {
            $subMenuActual = $arregloSubMenu[$i];
            // Verifica si el submenú existe.
            if ($subMenuActual -> getMedescripcion() == "seguimiento") {
                $existeSubMenu = true;
            }
            $i++;
        }
    }
    // Verifica que el usuario tenga los permisos de rol correspondientes.
    $permiso = false;
    foreach ($arregloMenu as $menu){
        if (($menu -> getObjMenu() -> getMedescripcion() == "seguimiento") && ($menu -> getObjMenu() -> getMedeshabilitado() == NULL) && $rolActivo -> getIdrol() == 3) {
            $permiso = true;
        }
    }
    if (!$permiso) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder al seguimiento de la compra ya que no tiene los permisos necesarios en su rol.</h1>";
    // Verifica que el menu padre no se encuentre deshabilitado
    } elseif (($rolActivo -> getIdrol() == 3) && (!isset($arregloMenuPadre))) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder al seguimiento de la compra ya que la página se encuentra deshabilitada en una jerarquía superior del menú.</h1>";
    } elseif (!$subMenuDeshabilitado) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder al seguimiento de la compra ya que la página se encuentra deshabilitada.</h1>";
    } elseif (!$existeSubMenu) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder al seguimiento de la compra ya que la página no existe.</h1>";
    } else {
?>

<?php

    $sesionActual = new Session();
    $objAbmUsuario = new AbmUsuario();
    $usuarioActual = $objAbmUsuario -> buscar(['usnombre' => $sesionActual -> getUsuario() -> getUsnombre(), 'uspass' => $sesionActual -> getUsuario() -> getUspass()]);
    $idUsuario = $usuarioActual[0]->getIdUsuario();
    $arreglo["idusuario"] = $idUsuario;
    $arreglo["metodo"] = "carrito";
    $objAbmCompra = new AbmCompra();
    $listaComprasUsuarioAct = $objAbmCompra->buscar($arreglo);
    echo '<table id="detalleCompra" class="easyui-datagrid" style="width:800px"
        toolbar="#toolbarDetalleCompra"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="foto" width="40">Imagen</th>
            <th field="pronombre" width="85">Nombre del Producto</th>
            <th field="cicantidad" width="50">Cantidad</th>
            <th field="proprecio" width="107">Precio Unitario</th>
            <th field="preciototal" width="90">Precio Total</th>
        </tr>
    </thead>
    <tbody>';
    if(count($listaComprasUsuarioAct) == 1){
        $arreglo2["idcompra"] = $listaComprasUsuarioAct[0]->getIdcompra();
        $objAbmCompraItem = new AbmCompraItem();
        $listaObjCompraItem = $objAbmCompraItem->buscar($arreglo2);
        $totalCompra = 0;
        foreach($listaObjCompraItem as $compraItem){
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
    }
?>




<?php
    }
    include_once("../estructura/pie.php");
?>