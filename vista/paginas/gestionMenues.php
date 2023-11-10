<?php
    include_once("../../configuracion.php");
    $tituloPagina = "Gestion de Menues";
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

<table id="dgMenu" class="easyui-datagrid" style="width:80%"
        url="../accion/administrador/listarMenues.php"
        toolbar="#toolbarMenu"
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
<div id="toolbarMenu">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()">Nuevo Menú</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()">Editar Menú</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenu()">Habilitar/Deshabilitar</a>
</div>

<div id="dlgMenu" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgMenu-buttons'">
    <form id="fmMenu" method="post" novalidate style="margin:0;padding:20px 50px">
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
            <input name="idpadre" class="easyui-textbox" required="true" style="width:100%">
        </div>
      <!--  <div>
            <input type="hidden" name="medeshabilitado" value="medeshabilitado">
        </div>  -->
        <div>
            <input type="hidden" name="idmenu" value="idmenu">
        </div>
    </form>
</div>
<div id="dlgMenu-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveMenu()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgMenu').dialog('close')" style="width:90px">Cancelar</a>
</div>

<!-- Tabla para gestionar MenuRol -->

<br>
<h2>Gestion de MenuRol</h2>
<p>Pulse los botones para realizar las acciones que desee.</p>

<table id="dgMenuRol" class="easyui-datagrid" style="width:700px"
        url="../accion/administrador/listarMenuRoles.php"
        toolbar="#toolbarMenuRol"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="idmenu" width="25">Id Menu</th>
            <th field="menombre" width="25">Nombre del Menu</th>
            <th field="idrol" width="25">Id Rol</th>
            <th field="rodescripcion" width="25d">Descripcion</th>
        </tr>
    </thead>
</table>
<div id="toolbarMenuRol">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenuRol()">Nuevo UsuarioRol</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenuRol()">Eliminar UsuarioRol</a>
</div>

<div id="dlgMenuRol" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgMenuRol-buttons'">
    <form id="fmMenuRol" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del menuRol</h3>
        <div style="margin-bottom:10px">
            <label for="idmenu">Id Menu:</label>
            <input name="idmenu" class="easyui-textbox" required="true"style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label for="idrol">Id Rol:</label>
            <input name="idrol" class="easyui-textbox" required="true" style="width:100%">
        </div>
    </form>
</div>
<div id="dlgMenuRol-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveMenuRol()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgMenuRol').dialog('close')" style="width:90px">Cancelar</a>
</div>

<!-- Tabla para gestionar Roles -->

<br>
<h2>Gestion de Roles</h2>
<p>Pulse los botones para realizar las acciones que desee.</p>

<table id="dg3" class="easyui-datagrid" style="width:700px"
        url="../accion/administrador/listarRoles.php"
        toolbar="#toolbar3"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="idrol" width="50">Id Rol</th>
            <th field="rodescripcion" width="50">Descripcion</th>
        </tr>
    </thead>
</table>
<div id="toolbar3">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newRol()">Nuevo Rol</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRol()">Editar Rol</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRol()">Eliminar Rol</a>
</div>

<div id="dlg3" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg3-buttons'">
    <form id="fm3" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del Rol</h3>
        <div style="margin-bottom:10px">
            <label for="rodescripcion">Descripción:</label>
            <input name="rodescripcion" class="easyui-textbox" required="true" style="width:100%">
        </div>
        <div>
            <input type="hidden" name="idrol" value="idrol">
        </div>
    </form>
</div>
<div id="dlg3-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveRol()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg3').dialog('close')" style="width:90px">Cancelar</a>
</div>


<div style="height: 76px;"></div>

<?php
    include_once("../estructura/pie.php");
?>
