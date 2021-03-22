<?php

require_once 'models/departamento.php';
require_once 'models/empresa.php';

class departamentoController {

    public function formRegistrar() {
        Utils::isDepartamento();
        $ObjEmpresa = new Empresa();
        $listaEmpresa = $ObjEmpresa->getAllEmpresa();

        require_once 'views/departamento/registrar.php';
    }

    public function SaveDepartamento() {
        Utils::isDepartamento();
        $abreviatura = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $empresa = $_POST['empresa'];
        $nota = $_POST['nota'];
        $id = $_POST['id'];
        
        $ObjDepartamento = new Departamento();
        $ObjDepartamento->setAbreviatura($abreviatura);
        $ObjDepartamento->setCodigo_compañia($empresa);
        $ObjDepartamento->setNombre($nombre);
        $ObjDepartamento->setNota($nota);
        
        if($id == 0){
            $resultado = $ObjDepartamento->saveDepartamento();
        }else{
            $ObjDepartamento->setId($id);
            $resultado = $ObjDepartamento->actualizarDatosDepartamento();
        }
        
        if (isset($resultado)) {
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Transaccion correcta</div>";
        } else {
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> Error en la transaccion</div>";
        }
        header("Location: " . base_url . "Departamento/listaDepartamentos");
    }

    public function organigrama() {
        Utils::isOrganigrama();
        require_once 'views/organigrama/departamento.php';
    }
    
    public function listaDepartamentos() {
        Utils::isDepartamento();
        $ObjDepartamento = new Departamento();
        $listaDepartamento = $ObjDepartamento->getAllDepartamento();
        require_once 'views/departamento/listaDepartamentos.php';
    }
    
    public function eliminarDepartamento() {
        $iddepartamento = $_GET['id'];
        $ObjDepartamento = new Departamento();
        $ObjDepartamento->setId($iddepartamento);
        $estado = $ObjDepartamento->deleteDepartamento();
        
         if ($estado) {
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Transaccion correcta</div>";
        } else {
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> Error en la transaccion</div>";
        }
        header("Location: " . base_url . "Departamento/listaDepartamentos");
        
    }
    
    public function getDatosDepartamento() {
        Utils::isDepartamento();
        $idDepartamento = $_GET['id'];
        
        $objDepartamento = new Departamento();
        $objDepartamento->setId($idDepartamento);
        $rowD  = $objDepartamento->getDatosDepartamento()->fetch_object();
        
        $ObjEmpresa = new Empresa();
        $listaEmpresa = $ObjEmpresa->getAllEmpresa();
        
        require_once 'views/Departamento/registrar.php';
        
    }

}
