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

<!-- Tabla para gestionar Usuario -->

<br>
<h2>Gestion de Usuarios</h2>
<p>Pulse los botones para realizar las acciones que desee.</p>

<table id="dg" class="easyui-datagrid" style="width:700px"
        url="../accion/administrador/listarUsuarios.php"
        toolbar="#toolbar"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="idusuario" width="15">Id</th>
            <th field="usnombre" width="60">Nombre</th>
            <th field="uspass" width="120">Contraseña</th>
            <th field="usmail" width="55">Email</th>
            <th field="usdeshabilitado" width="50">Estado</th>
        </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Usuario</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Usuario</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Habilitar/Deshabilitar</a>
</div>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del usuario</h3>
        <div style="margin-bottom:10px">
            <label for="usnombre">Nombre:</label>
            <input name="usnombre" class="easyui-textbox" required="true" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label for="uspass">Contraseña:</label>
            <input name="" class="easyui-textbox" required="true" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label for="usmail">Email:</label>
            <input name="usmail" class="easyui-textbox" required="true" validType="email" style="width:100%">
        </div>
        <div>
            <input type="hidden" name="usdeshabilitado" value="usdeshabilitado">
        </div>
        <div>
            <input type="hidden" name="idusuario" value="idusuario">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>


<!-- Tabla para gestionar UsuarioRol -->

<br>
<h2>Gestion de UsuarioRol</h2>
<p>Pulse los botones para realizar las acciones que desee.</p>

<table id="dg2" class="easyui-datagrid" style="width:700px"
        url="../accion/administrador/listarUsuarioRol.php"
        toolbar="#toolbar2"
        rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="idusuario" width="25">Id Usuario</th>
            <th field="usnombre" width="25">Nombre de Usuario</th>
            <th field="idrol" width="25">Id Rol</th>
            <th field="rodescripcion" width="25d">Descripcion</th>
        </tr>
    </thead>
</table>
<div id="toolbar2">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUsuarioRol()">Nuevo UsuarioRol</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUsuarioRol()">Eliminar UsuarioRol</a>
</div>

<div id="dlg2" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg2-buttons'">
    <form id="fm2" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>Informacion del usuarioRol</h3>
        <div style="margin-bottom:10px">
            <label for="idusuario">Id Usuario:</label>
            <input name="idusuario" class="easyui-textbox" required="true"style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <label for="idrol">Id Rol:</label>
            <input name="idrol" class="easyui-textbox" required="true" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg2-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUsuarioRol()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg2').dialog('close')" style="width:90px">Cancelar</a>
</div>


<!-- Tabla para gestionar UsuarioRol -->

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
