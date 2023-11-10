<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Gestion de Usuarios";
    $sesionLogin = new Session();
    if ($sesionLogin -> validar()) {
        include_once("../estructura/encabezadoPrivado.php");
    } else {
        $sesionLogin -> cerrar();
        include_once("../estructura/encabezadoPublico.php");
    }
?>

<!-- Tabla para gestionar Menú -->

<br>
<h2>Gestion de Menues</h2>
<p>Pulse los botones para realizar las acciones que desee.</p>

<table id="dg" class="easyui-datagrid" style="width:80%"
        url="../accion/administrador/listarMenues.php"
        toolbar="#toolbar"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="idmenu" width="15">Id</th>
            <th field="menombre" width="80">Nombre</th>
            <th field="medescripcion" width="100">Descripcion</th>
            <th field="idpadre" width="55">Id Padre</th>
            <th field="medeshabilitado" width="50">Estado</th>
        </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()">Nuevo Menú</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()">Editar Menú</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenu()">Habilitar/Deshabilitar</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del Menú</h3>
        <div style="margin-bottom:10px">
            <label for="menombre">Nombre:</label>
            <input name="menombre" class="easyui-textbox" required="true" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label for="medescripcion">Descripción:</label>
            <input name="medescripcion" class="easyui-textbox" required="true" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label for="idpadre">Id padre:</label>
            <input name="idpadre" class="easyui-textbox" required="true" validType="email" style="width:100%">
        </div>
        <div>
            <input type="hidden" name="medeshabilitado" value="medeshabilitado">
        </div>
        <div>
            <input type="hidden" name="idmenu" value="idmenu">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveMenu()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>

<div style="height: 76px;"></div>

<?php
    include_once("../estructura/pie.php");
?>
