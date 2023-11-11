var url;

// FUNCIONES PARA LA GESTION DE USUARIOS
function newUser(){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Usuario');
    $('#fm').form('clear');
    url = '../accion/administrador/altaUsuarios.php';
}
function editUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Usuario');
        $('#fm').form('load',row);
        url = '../accion/administrador/editarUsuarios.php';
    }
}
function saveUser(){
    $('#fm').form('submit',{
        url: url,
        iframe: false,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg').dialog('close');        // close the dialog
                $('#dg').datagrid('reload');    // reload the user data
            }
        }
    });
}
function destroyUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Cambiar el estado del Usuario?',function(r){
            if (r){
                $('#fm').form('load',row);
                url = '../accion/administrador/bajaUsuarios.php';
                $('#fm').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dg').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}


// FUNCIONES PARA LA GESTION DE USUARIOROL
function newUsuarioRol(){
    $('#dlg2').dialog('open').dialog('center').dialog('setTitle','Nuevo UsuarioRol');
    $('#fm2').form('clear');
    url = '../accion/administrador/altaUsuarioRol.php';
}

function saveUsuarioRol(){
    $('#fm2').form('submit',{
        url: url,
        iframe: false,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg2').dialog('close');        // close the dialog
                $('#dg2').datagrid('reload');    // reload the user data
            }
        }
    });
}

function destroyUsuarioRol(){
    var row = $('#dg2').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Estás seguro que quieres eliminar el UsuarioRol definitivamente?',function(r){
            if (r){
                $('#fm2').form('load',row);
                url = '../accion/administrador/bajaUsuarioRol.php';
                $('#fm2').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dg2').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}


// FUNCIONES PARA LA GESTION DE ROLES
function newRol(){
    $('#dlg3').dialog('open').dialog('center').dialog('setTitle','Nuevo Rol');
    $('#fm3').form('clear');
    url = '../accion/administrador/altaRol.php';
}

function saveRol(){
    $('#fm3').form('submit',{
        url: url,
        iframe: false,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg3').dialog('close');        // close the dialog
                $('#dg3').datagrid('reload');    // reload the user data
            }
        }
    });
}

function editRol(){
    var row = $('#dg3').datagrid('getSelected');
    if (row){
        $('#dlg3').dialog('open').dialog('center').dialog('setTitle','Editar Rol');
        $('#fm3').form('load',row);
        url = '../accion/administrador/editarRol.php';
    }
}

function destroyRol(){
    var row = $('#dg3').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Estás seguro que quieres eliminar el Rol definitivamente?',function(r){
            if (r){
                $('#fm3').form('load',row);
                url = '../accion/administrador/bajaRol.php';
                $('#fm3').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dg3').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}

// FUNCIONES PARA LA GESTION DE MENUES
function newMenu() {
    $('#dlgMenu').dialog('open').dialog('center').dialog('setTitle','Nuevo Menu');
    $('#fmMenu').form('clear');
    url = '../accion/administrador/altaMenues.php';
}

function editMenu(){
    var row = $('#dgMenu').datagrid('getSelected');
    if (row){
        $('#dlgMenu').dialog('open').dialog('center').dialog('setTitle','Editar Menu');
        $('#fmMenu').form('load',row);
        url = '../accion/administrador/editarMenues.php';
    }
}

function saveMenu(){
    $('#fmMenu').form('submit',{
        url: url,
        iframe: false,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlgMenu').dialog('close');        // close the dialog
                $('#dgMenu').datagrid('reload');    // reload the user data
            }
        }
    });
}

function destroyMenu(){
    var row = $('#dgMenu').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Cambiar el estado del Menu?',function(r){
            if (r){
                $('#fmMenu').form('load',row);
                url = '../accion/administrador/bajaMenues.php';
                $('#fmMenu').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dgMenu').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}


// FUNCIONES PARA LA GESTION DE MENUROL
function newMenuRol(){
    $('#dlgMenuRol').dialog('open').dialog('center').dialog('setTitle','Nuevo MenuRol');
    $('#fmMenuRol').form('clear');
    url = '../accion/administrador/altaMenuRol.php';
}

function saveMenuRol(){
    $('#fmMenuRol').form('submit',{
        url: url,
        iframe: false,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlgMenuRol').dialog('close');        // close the dialog
                $('#dgMenuRol').datagrid('reload');    // reload the user data
            }
        }
    });
}

function destroyMenuRol(){
    var row = $('#dgMenuRol').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Estás seguro que quieres eliminar el MenuRol definitivamente?',function(r){
            if (r){
                $('#fmMenuRol').form('load',row);
                url = '../accion/administrador/bajaMenuRol.php';
                $('#fmMenuRol').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dgMenuRol').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}

// FUNCIONES PARA LA GESTION DE USUARIO CLIENTE
function editLogin() {
    var row = $('#dgActLog').datagrid('getSelected');
    if (row){
        $('#dlgActLog').dialog('open').dialog('center').dialog('setTitle','Editar Usuario');
        $('#fmActLog').form('load',row);
        url = '../accion/cliente/editarUsuario.php';
    }
}

function saveLogin() {
    $('#fmActLog').form('submit',{
        url: url,
        iframe: false,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlgActLog').dialog('close');        // close the dialog
                $('#dgActLog').datagrid('reload');    // reload the user data
            }
        }
    });
}


// FUNCIONES PARA LA GESTION DE COMPRAESTADO
function siguienteEstado(){
    var row = $('#dgCompraEstado').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Seguro que desea avanzar la CompraEstado?',function(r){
            if (r){
                $('#fmCompraEstado').form('load',row);
                url = '../accion/administrador/siguienteEstadoCompra.php';
                $('#fmCompraEstado').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dgCompraEstado').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}

function cancelarCompraEstado(){
    var row = $('#dgCompraEstado').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Seguro que desea cancelar la CompraEstado?',function(r){
            if (r){
                $('#fmCompraEstado').form('load',row);
                url = '../accion/administrador/cancelarCompraEstado.php';
                $('#fmCompraEstado').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dgCompraEstado').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}

// FUNCIONES PARA LA GESTION DE COMPRA
function destroyCompra() {
    var row = $('#dgClienteCompra').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmar','Cambiar el estado del Menu?',function(r){
            if (r){
                $('#fmClienteCompra').form('load',row);
                url = '../accion/cliente/bajaClienteCompra.php';
                $('#fmClienteCompra').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dgClienteCompra').datagrid('reload');    // reload the menu data
                        }
                    }
                });
            }
        });
    }
}