<?php

require_once 'models/estudio.php';
class estudioController{
    
    public function registrar() {
        Utils::isEmpleado();
        $estudio = new Estudio();
        $id_empleado = $_SESSION['identity']->id_emp;
        $listaEstudio = $estudio->getEstudiosEmplado($id_empleado);
        

        require_once 'views/empleado/estudio/registrar.php';
    }
    
    public function saveEstudio() {
        Utils::isEmpleado();
        $id_empleado = $_SESSION['identity']->id_emp;
        $nombre = $_POST['nombre'];
        $nivel = $_POST['nivel'];
        $institucion = $_POST['institucion'];
        $nota = $_POST['nota'];
        $year_ini = $_POST['year_ini'];
        $year_fin = $_POST['year_fin'];
        $id_estudio = $_POST['id_estudio'];
        
        $ObjEstudioEmpleado = new Estudio();
        
        //Lista de estudios
        
        
        $ObjEstudioEmpleado->setNombre($nombre);
        $ObjEstudioEmpleado->setNivel($nivel);
        $ObjEstudioEmpleado->setInstitucion($institucion);
        $ObjEstudioEmpleado->setNota($nota);
        $ObjEstudioEmpleado->setAnho_inicio($year_ini);
        $ObjEstudioEmpleado->setAnho_fin($year_fin);
        $ObjEstudioEmpleado->setId_empleado($id_empleado);
        
        if($id_estudio != 0){
             $ObjEstudioEmpleado->setId($id_estudio);
            $resultado = $ObjEstudioEmpleado->updateEstudiosEmpleado();
  
        }else{
            $resultado = $ObjEstudioEmpleado->saveEstudiosEmpleado();
        }
        
        
        $listaEstudio = $ObjEstudioEmpleado->getEstudiosEmplado($id_empleado);
        

       
        if($resultado && isset($resultado)){
            $_SESSION['mensaje']='correct';
        }else{
            $_SESSION['mensaje']='error';
        }
        
        require_once 'views/empleado/estudio/registrar.php';
    }
    
    public function editarEstudio() {
        Utils::isEmpleado();
        $idestudio= $_GET['id'];
        $objEstudio = new Estudio();
        $objEstudio->setId($idestudio);
        $row = $objEstudio->getOneEstudio()->fetch_object();
        
        $id_empleado = $_SESSION['identity']->id_emp;
        $listaEstudio = $objEstudio->getEstudiosEmplado($id_empleado);
                
        require_once 'views/empleado/estudio/registrar.php';
    }
    
    public function eliminarEstudio() {
        Utils::isEmpleado();
        $idestudio= $_GET['id'];
        $objEstudio = new Estudio();
        $objEstudio->setId($idestudio);
        $objEstudio->deleteOneEstudio();
        
        $id_empleado = $_SESSION['identity']->id_emp;
        $listaEstudio = $objEstudio->getEstudiosEmplado($id_empleado);
        require_once 'views/empleado/estudio/registrar.php';
    }
}