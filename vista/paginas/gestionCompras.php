<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Gestión de Compras";
    include_once("../estructura/encabezadoPrivado.php");

    if (isset($arregloSubMenu)) {
        $i = 0;
        $subMenuDeshabilitado = false;
        while (($i < count($arregloSubMenu)) && (!$subMenuDeshabilitado)) {
            $subMenuActual = $arregloSubMenu[$i];
            // Verifica que el submenú se encuentre habilitado.
            if ($subMenuActual -> getMedeshabilitado() != NULL) {
                $subMenuDeshabilitado = true;
            }
            $i++;
        }
        $i = 0;
        $existeSubMenu = false;
        while (($i < count($arregloSubMenu)) && (!$existeSubMenu)) {
            $subMenuActual = $arregloSubMenu[$i];
            // Verifica si el submenú existe.
            if ($subMenuActual -> getMedescripcion() == "gestionCompras") {
                $existeSubMenu = true;
            }
            $i++;
        }
    }
    // Verifica que el usuario tenga los permisos de rol correspondientes.
    $permiso = false;
    foreach ($arregloMenu as $menu){
        if (($menu -> getObjMenu() -> getMedescripcion() == "gestionCompras") && ($menu -> getObjMenu() -> getMedeshabilitado() == NULL) && $rolActivo -> getIdrol() == 1) {
            $permiso = true;
        }
    }
    if (!$permiso) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede gestionar compras ya que no tiene los permisos necesarios en su rol.</h1>";
    // Verifica que el menu padre no se encuentre deshabilitado
    } elseif (($rolActivo -> getIdrol() == 1) && (!isset($arregloMenuPadre))) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede gestionar compras ya que la página se encuentra deshabilitada en una jerarquía superior del menú.</h1>";
    } elseif (!$subMenuDeshabilitado) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede gestionar compras ya que la página se encuentra deshabilitada.</h1>";
    } elseif (!$existeSubMenu) {
        echo "<a class='btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start mt-2' href='inicio.php'><i class='bi bi-arrow-90deg-left'></i></a>";
        echo "<br><br><br><h1 class='display-5 pb-3 fw-bold'>No puede gestionar compras ya que la página no existe.</h1>";
    } else {
?>

<!-- Tabla para gestionar CompraEstado -->

<br>
<h2>Gestion de CompraEstado</h2>
<p>Pulse los botones para realizar las acciones que desee.</p>

<table id="dgCompraEstado" class="easyui-datagrid" style="width:80%"
        url="../accion/administrador/listarCompraEstado.php"
        toolbar="#toolbarCompraEstado"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="idcompraestado" width="50">Id Compra Estado</th>
            <th field="idcompra" width="40">Id Compra</th>
            <th field="idcompraestadotipo" width="65">Id CompraEstadoTipo</th>
            <th field="cetdescripcion" width="60">Estado</th>
            <th field="cefechaini" width="55">Fecha de inicio</th>
            <th field="cefechafin" width="50">Fecha de fin</th>
            <th field="usnombre" width="50">Comprador</th>
        </tr>
    </thead>
</table>
<div id="toolbarCompraEstado">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="siguienteEstado()">Siguiente Estado</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="cancelarCompraEstado()">Cancelar Compra</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="muestraDetalleCompra()">Detalles de la Compra</a>
</div>

<div id="dlgCompraEstado" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgCompraEstado-buttons'">
    <form id="fmCompraEstado" method="post" novalidate style="margin:0;padding:20px 50px">
        <div>
            <input type="hidden" name="idcompraestado" value="idcompraestado">
        </div>
        <div>
            <input type="hidden" name="idcompra" value="idcompra">
        </div>
        <div>
            <input type="hidden" name="idcompraestadotipo" value="idcompraestadotipo">
        </div>
        <div>
            <input type="hidden" name="cefechaini" value="cefechaini">
        </div>
        <div>
            <input type="hidden" name="cefechafin" value="cefechafin">
        </div>
    </form>
</div>
<div id="dlgCompraEstado-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveCompraEstado()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgCompraEstado').dialog('close')" style="width:90px">Cancelar</a>
</div>


<div style="height: 76px;"></div>

<?php
    }
    include_once("../estructura/pie.php");
?>
