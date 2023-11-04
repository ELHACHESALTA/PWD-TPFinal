<?php

    /**
     * Encapsula el envío por POST o GET de la información de los elementos del formulario como así los archivos cargados.
     * @return array
     */
    function data_submitted() {
        $_AAux = array();
        if (!empty($_POST)) {
            $_AAux = $_POST;
        } else {
            if (!empty($_GET)) {
                $_AAux = $_GET;
            }
        }
        if (!empty($_FILES)) {
            array_push($_AAux, $_FILES);
        }
        if (count($_AAux)) {
            foreach ($_AAux as $indice => $valor) {
                if ($valor == "") {
                    $_AAux[$indice] = "null" ;
                }
            }
        }
        return $_AAux;
    }

    spl_autoload_register(function($class_name) {
        $directorys = array(
            $GLOBALS['ROOT'].'modelo/',
            $GLOBALS['ROOT'].'modelo/conector/',
            $GLOBALS['ROOT'].'control/',
        );
        foreach($directorys as $directory) {
            if (file_exists($directory.$class_name . ".php")) {
                require_once($directory.$class_name . ".php");
                return;
            }
        }
    });

?>