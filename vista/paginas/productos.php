<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Productos";
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

    $datos = data_submitted();
    $arregloProductos = [];
    if (isset($datos['idproducto'])){
        $objAbmProducto = new AbmProducto();
        $arregloProductos = $objAbmProducto -> buscar($datos);
    }
    $objProducto = NULL;
    if (!empty($arregloProductos)){
        $objProducto = $arregloProductos[0];
    }

?>

<div class="row mt-5">
    <div class="col-2"></div>
    <div class="col-5">
        <img style="max-width:450px; max-height:450px" src="<?php echo '../img/productos/' . $objProducto -> getIdproducto() . '.jpg' ?>">      
    </div>
    <div class="col-3">
        <div class="row">
            <div class="col-12">
                <h5><?php echo $objProducto -> getPronombre()  ?></h5>
            </div>
            <div class="col-12">
                <p><?php echo $objProducto -> getProdetalle() ?></p>
            </div>
            <?php
                if ($objProducto -> getProcantstock() > 0 && $objProducto -> getProdeshabilitado() == NULL){
                    echo '<div class="col-12 mt-5">
                                <h6>Unidades disponibles: ' . $objProducto -> getProCantstock() . '</h6>
                            </div>
                            <form method="post" action="../accion/tienda/accionTienda.php">
                            <div class="col-12 mb-2">
                                <small>Cantidad</small>
                                <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="' . $objProducto -> getProcantstock() . '">';
                                if (isset($datos['error'])){
                                    if ($datos['error'] == 1){
                                        echo '<div style="color:red">Hubo un error con la compra. Intente de nuevo.</div>';
                                    }
                                    if ($datos['error'] == 2){
                                        echo '<div style="color:red">Falta de stock. Revise su carro de compras.</div>';
                                    }
                                    
                                }
                                echo '<input type="hidden" name="idproducto" id="idproducto" value="' . $datos['idproducto'] . '">';
                                echo '<input type="hidden" name="maxStock" id="maxStock" value="' . $objProducto ->  getProcantstock() . '">
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-dark" id="compra" name="compra" value="Agregar al carrito">
                            </div>
                            </form>';
                }else{
                    echo '<div class="col-12">
                            <h6>No disponible por el momento</h6>
                        </div>';
                }
            ?>
        </div>
    </div>
</div>

<?php
    }
    include_once("../estructura/pie.php");
?>