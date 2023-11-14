<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Tienda";
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
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder a la tienda ya que no tiene los permisos necesarios en su rol o el menú se encuentra deshabilitado.</h1>";
    // Verifica que el menu padre no se encuentre deshabilitado
    } elseif (($rolActivo -> getIdrol() == 3) && (!isset($arregloMenuPadre))) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder a la tienda ya que la página se encuentra deshabilitada en una jerarquía superior del menú.</h1>";
    } elseif (!$subMenuDeshabilitado) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder a la tienda ya que la página se encuentra deshabilitada.</h1>";
    } elseif (!$existeSubMenu) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede acceder a la tienda ya que la página no existe.</h1>";
    } else {
?>

<?php
    $objAbmProducto = new AbmProducto();
    $arregloProductos = $objAbmProducto -> buscar(NULL);
    echo '<div class="row text-center mb-5">';
        foreach ($arregloProductos as $producto){
            if ($producto -> getProdeshabilitado() == NULL){
                echo '<div class="col-3 mt-5" style="height:350px">';
                echo '<div style="background-color:#808080; padding:5px; height:350px">';
                $archivo = "../img/productos/" . $producto->getIdproducto() . ".jpg";
                if (file_exists($archivo)){
                    echo '<div id="img" style="height:250px"><a href="productos.php?idproducto=' . $producto -> getIdproducto() . '"><img class="img-fluid" style="max-height:230px; max-width:230px; margin-top:20px;" src="../img/productos/' . $producto -> getIdproducto() . '.jpg"></a></div>';
                } else {
                    echo '<div id="img" style="height:250px"><a href="productos.php?idproducto=' . $producto -> getIdproducto() . '"><img class="img-fluid" style="max-height:230px; max-width:230px; margin-top:20px;">Sin Imagen</a></div>';
                }
                echo '<div id="nombre" style="height:60px"><p>' . $producto -> getPronombre() . '</p></div>';
                echo '<div><p class="negrita">$' . $producto -> getProprecio() . '</p></div></div></div>';
            }
        }
    echo '</div>';
?>

<div style="height: 76px;"></div>

<?php
    }
    include_once("../estructura/pie.php");
?>