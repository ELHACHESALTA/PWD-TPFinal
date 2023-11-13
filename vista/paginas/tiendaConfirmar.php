<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Confirmar Compra";
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
            if ($subMenuActual -> getMedescripcion() == "tienda") {
                $existeSubMenu = true;
            }
            $i++;
        }
    }
    // Verifica que el usuario tenga los permisos de rol correspondientes.
    $permiso = false;
    foreach ($arregloMenu as $menu){
        if (($menu -> getObjMenu() -> getMedescripcion() == "tienda") && ($menu -> getObjMenu() -> getMedeshabilitado() == NULL) && $rolActivo -> getIdrol() == 3) {
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
    $datos=data_submitted();
    if($datos['compra']=="Comprar" && isset($datos['idcompra'])){
        $objAbmCompraItem = new AbmCompraitem();
        $arregloItems = $objAbmCompraItem -> buscar(['idcompra' => $datos['idcompra']]);
        if (!empty($arregloItems)){
            echo '<h1 class="text-center" style="margin-top: 30px;">Confirmar Compra</h1>';
            $totalPagar = 0;
            foreach($arregloItems as $item){
                echo '<div class="text-center">Producto: ' . $item -> getObjProducto() -> getPronombre();
                echo '&nbsp;&nbsp;Cantidad:' . $item -> getCicantidad() . '</div>';
                $totalPagar += ( $item -> getObjProducto() -> getProprecio()) * $item->getCicantidad();
            }
            echo '<div class="text-center" style="margin-top: 50px;">Total a pagar: $' . $totalPagar . '</div>';
            echo '<form method="post" action="../accion/tienda/accionTiendaConfirmar.php" class="text-center">';
            echo '<input type="hidden" name="idcompra" id="idcompra" value="' . $datos['idcompra'] . '">';
            echo '<input type="submit" value="Comprar" class="btn btn-dark m-3"></form>';
        }
    }
?>

<?php
    }
    include_once("../estructura/pie.php");
?>