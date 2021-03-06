<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

 

function errno(){
    $error = new errorController();
    $error->index(); 
}

if (isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombreControlador = controller_default;
} else {
        errno();
        exit();
}

if (class_exists($nombreControlador)) {

    $controlador = new $nombreControlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
    }else {
        errno();
    }
} else {
    errno();
}


