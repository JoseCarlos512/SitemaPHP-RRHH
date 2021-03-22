<?php

require_once "../../config/db.php";
require_once '../../models/empleado.php';

$id_jefe = $_POST['id'];

if ($id_jefe != 0) {
    $ObjEmpleado = new Empleado();
    $resultado = $ObjEmpleado->getNombreJefe($id_jefe);
    $resultado = $resultado->fetch_object();
    echo $resultado->nombre;
}else{
    echo "";
}



