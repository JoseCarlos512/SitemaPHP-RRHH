<?php
require_once 'models/capacitacion.php';
require_once 'models/empleado.php';
class capacitacionController {

    public function index() {
        
    }
    
    public function lista() {
        Utils::isCapacitacion();
        $ObjCapacitacion = new Capacitacion();
        $lista = $ObjCapacitacion->listaCapacitaciones();
        require_once 'views/capacitacion/lista.php';
    }
    
    public function agregarEmpleado() {
        Utils::isCapacitacion();
        $id_capacitacion = $_GET['id'];
        $ObjListaEmpleadoCapacitaciones = new Capacitacion();
        $lista2 = $ObjListaEmpleadoCapacitaciones->listaEmpleadosCapacitaciones();
        require_once 'views/capacitacion/agregarEmpleado.php';
    }
    
    public function buscar() {
        Utils::isCapacitacion();
        $search = $_POST['nombre'];
        $id_capacitacion = $_POST['id_capacitacion'];
        
        $empleado = new Empleado();
        $empleado->setBusqueda($search);
        $lista = $empleado->buscar();
        
        $ObjListaEmpleadoCapacitaciones = new Capacitacion();
        $lista2 = $ObjListaEmpleadoCapacitaciones->listaEmpleadosCapacitaciones();
        
        require_once 'views/capacitacion/agregarEmpleado.php';
    }
    
    public function matricular() {
        Utils::isCapacitacion();
        $id_empleado = $_GET['idEmpleado'];
        $id_capacitacion = $_GET['id_capacitacion'];
        $objUsuarioSaveCapacitacion = new Capacitacion();
        // En este caso usare el id de la capacitacion para albergar el id del empleado
        //$objUsuarioSaveCapacitacion->setId($id_empleado);
        $estado = $objUsuarioSaveCapacitacion->matricular($id_empleado,$id_capacitacion);
        
        if($estado){
            $_SESSION['mensaje']='correct';
        }else{
            $_SESSION['mensaje']='error';
        }
        
        $ObjListaEmpleadoCapacitaciones = new Capacitacion();
        $lista2 = $ObjListaEmpleadoCapacitaciones->listaEmpleadosCapacitaciones();
        require_once 'views/capacitacion/agregarEmpleado.php';
    }
    
    public function eliminarMatriculado() {
        Utils::isCapacitacion();
        $id_empleado = $_GET['id'];
        $objEmpleadoCapacitacion = new Capacitacion();
        $estado = $objEmpleadoCapacitacion->deleteEmpleado($id_empleado);
        
        if($estado){
            $_SESSION['mensaje']='correct';
        }else{
            $_SESSION['mensaje']='error';
        }
        
        $ObjListaEmpleadoCapacitaciones = new Capacitacion();
        $lista2 = $ObjListaEmpleadoCapacitaciones->listaEmpleadosCapacitaciones();
        require_once 'views/capacitacion/agregarEmpleado.php';
    }
    
    public function agregarCapacitacion() {
        Utils::isCapacitacion();
        require_once 'views/capacitacion/registro.php';
    }
    
    public function saveCapacitacion() {
        Utils::isCapacitacion();
        $codigo = isset($_POST['codigo'])?$_POST['codigo']:false;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:false;
        $entrenador = isset($_POST['entrenador'])?$_POST['entrenador']:false;
        $tipo_conocimiento = isset($_POST['tipo_conocimiento'])?$_POST['tipo_conocimiento']:false;
        $nombre_certificado = isset($_POST['nombre_certificado'])?$_POST['nombre_certificado']:false;
        $institucion = isset($_POST['institucion'])?$_POST['institucion']:false;
        $fecha_inicio = isset($_POST['fecha_inicio'])?$_POST['fecha_inicio']:false;
        $fecha_fin = isset($_POST['fecha_fin'])?$_POST['fecha_fin']:false;
        $estado = isset($_POST['estado'])?$_POST['estado']:false;
        $observacion = isset($_POST['observacion'])?$_POST['observacion']:false;
        $id_capacitacion = $_POST['id'];
                
        $objCapacitacion = new Capacitacion();
        
        $objCapacitacion->setCode_capacitacion($codigo);
        $objCapacitacion->setNombre($nombre);
        $objCapacitacion->setEntrenador($entrenador);
        $objCapacitacion->setTipo_conocimiento($tipo_conocimiento);
        $objCapacitacion->setNombre_certificado($nombre_certificado);
        $objCapacitacion->setInstitucion($institucion);
        $objCapacitacion->setFec_ini($fecha_inicio);
        $objCapacitacion->setFec_fin($fecha_fin);
        $objCapacitacion->setEstado($estado);
        $objCapacitacion->setObservacion($observacion);
        
        if($id_capacitacion==0){
            $estado = $objCapacitacion->guardarCapacitacion();
        }else{
            $objCapacitacion->setId($id_capacitacion);
            $estado = $objCapacitacion->updateCapacitacion();
        }
        
        
        if($estado){
            $_SESSION['mensaje']='correct';
        }else{
            $_SESSION['mensaje']='error';
        }
        
        $ObjCapacitacion = new Capacitacion();
        $lista = $ObjCapacitacion->listaCapacitaciones();
        require_once 'views/capacitacion/lista.php';
    }
    
    public function editarCapacitacion() {
        Utils::isCapacitacion();
        $id_capacitacion = $_GET['id'];
        $objCapacitacion = new Capacitacion();
        $objCapacitacion->setId($id_capacitacion);
        
        $row = $objCapacitacion->getDatosCapacitacion()->fetch_object();
        require_once 'views/capacitacion/registro.php';
    }
    
    public function eliminarCapacitacion() {
        Utils::isCapacitacion();
        $id_capacitacion = $_GET['id'];
        
        //Delete permisos capacitacion
        $ObjCapacitacion = new Capacitacion();
        $ObjCapacitacion->setId($id_capacitacion);
        $estado = $ObjCapacitacion->deleteCapacitacion();
        
        if($estado){
            $_SESSION['mensaje']='correct';
        }else{
            $_SESSION['mensaje']='error';
        }
        
        $ObjCapacitacion = new Capacitacion();
        $lista = $ObjCapacitacion->listaCapacitaciones();
        require_once 'views/capacitacion/lista.php';
    }
}

