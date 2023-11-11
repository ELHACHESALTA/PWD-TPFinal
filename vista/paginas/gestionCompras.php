<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Gestion de Compras";
    $sesionLogin = new Session();
    if ($sesionLogin -> validar()) {
        include_once("../estructura/encabezadoPrivado.php");
    } else {
        $sesionLogin -> cerrar();
        include_once("../estructura/encabezadoPublico.php");
    }
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
            <th field="idcompraestado" width="60">Id Compra Estado</th>
            <th field="idcompra" width="60">Id Compra</th>
            <th field="idcompraestadotipo" width="100">Id CompraEstadoTipo</th>
            <th field="cetdescripcion" width="70">Estado</th>
            <th field="cefechaini" width="55">Fecha de inicio</th>
            <th field="cefechafin" width="50">Fecha de fin</th>
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
    include_once("../estructura/pie.php");
?>
