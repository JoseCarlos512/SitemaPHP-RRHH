<?php

require_once 'models/metas.php';
require_once 'models/empleado.php';
require_once 'models/empresa.php';

class metasController {

    public function metasEmpresa() {
        Utils::isMetas();
        $listaEmpresa = new Empresa();
        $resultado = $listaEmpresa->getAllEmpresa();
        require_once 'views/metas/empresa.php';
    }

    public function listaMetaEmpresa() {
        Utils::isMetas();
        $objMetas = new Metas();
        $lista = $objMetas->listaEmpresa();
        require_once 'views/metas/listaMetaEmpresa.php';
    }

    public function editarEmpresaMeta() {
        Utils::isMetas();
        $idmeta_empresa = $_GET['id'];
        $objMetas = new Metas();
        $objMetas->setId($idmeta_empresa);
        $row = $objMetas->getDatosMetasEmpresa()->fetch_object();

        require_once 'views/metas/empresa.php';
    }

    public function elimininarEmpresaMeta() {
        Utils::isMetas();
        $idmeta_empresa = $_GET['id'];
        $objMetas = new Metas();
        $objMetas->setId($idmeta_empresa);
        $estado = $objMetas->deleteEmpresaMeta();

        $lista = $objMetas->listaEmpresa();
        require_once 'views/metas/listaMetaEmpresa.php';
    }

    public function metasDepartamento() {
        Utils::isMetas();
        require_once 'views/metas/departamento.php';
    }

    public function listaMetaDepartamento() {
        Utils::isMetas();
        $objMetas = new Metas();
        $lista = $objMetas->listaDepartamento();
        require_once 'views/metas/listaMetaDepartamento.php';
    }

    public function editarDepartamentoMeta() {
        Utils::isMetas();
        $idmeta_departamento = $_GET['id'];
        $objMetas = new Metas();
        $objMetas->setId($idmeta_departamento);
        $row = $objMetas->getDatosMetasDepartamento()->fetch_object();

        require_once 'views/metas/departamento.php';
    }

    public function eliminarDepartamentoMeta() {
        Utils::isMetas();
        $idmeta_departamento = $_GET['id'];
        $objMetas = new Metas();
        $objMetas->setId($idmeta_departamento);
        $objMetas->deleteDepartamentoMeta();

        $lista = $objMetas->listaDepartamento();
        require_once 'views/metas/listaMetaDepartamento.php';
    }

    public function metasEmpleado() {
        Utils::isMetas();
        $objEmpleado = new Empleado();
        $resultado = $objEmpleado->listar();
        require_once 'views/metas/Empleado.php';
    }

    public function listaMetaEmpleado() {
        Utils::isMetas();
        $objMetas = new Metas();
        $idempleado = false;
        $lista = $objMetas->listaMetaEmpleado($idempleado);
        require_once 'views/metas/listaMetaEmpleado.php';
    }

    public function metasPersonales() {
        Utils::isMetas();
        $idempleado = $_SESSION['identity']->id_emp;

        $objMetas = new Metas();
        $lista = $objMetas->listaMetaEmpleado($idempleado);

        require_once 'views/metas/listaMetaEmpleado.php';
    }

    public function editarEmpleadoMeta() {
        Utils::isMetas();
        $idmeta_empleado = $_GET['id'];
        $objMetas = new Metas();
        $objMetas->setId($idmeta_empleado);
        $row = $objMetas->getDatosMetasEmpleado()->fetch_object();

        require_once 'views/metas/empleado.php';
    }

    public function eliminarEmpleadoMeta() {
        Utils::isMetas();
        $idmeta_empleado = $_GET['id'];
        $objMetas = new Metas();
        $objMetas->setId($idmeta_empleado);
        $resultado = $objMetas->deleteEmpleadoMeta();
        
        $idempleado = null;
        $lista = $objMetas->listaMetaEmpleado($idempleado);
        
        if($resultado){
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Transaccion correcta</div>";
        }else{
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> Error en la transaccion</div>";
        }
        
        require_once 'views/metas/listaMetaEmpleado.php';
    }

    public function saveMetasEmpleado() {
        Utils::isMetas();
        $id_empleado = $_POST['id_empleado'];
        $nombre_meta = $_POST['nombre_meta'];
        $fecha_fin = $_POST['fecha_fin'];
        $descripcion = $_POST['descripcion'];
        $id_metaEmpleado = $_POST['id_meta_empleado'];
        
        $resultado1 = $_POST['resultado'];
        $comentario = $_POST['comentario'];
        

        $objMetaEmpleado = new Metas();
        
        
        if($id_metaEmpleado != 0){
            $objMetaEmpleado->setId($id_metaEmpleado);
            $objMetaEmpleado->setResultado($resultado1);
            $objMetaEmpleado->setComent_resultado($comentario);
            $resultado = $objMetaEmpleado->saveResultado();
       
        }else{
            $objMetaEmpleado->setId_empleado($id_empleado);
            $objMetaEmpleado->setNombre($nombre_meta);
            $objMetaEmpleado->setFecha_fin($fecha_fin);
            $objMetaEmpleado->setDescripcion($descripcion);
            $resultado = $objMetaEmpleado->saveMetaEmpleado();
        }
  
        if($resultado){
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Transaccion correcta</div>";
        }else{
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> Error en la transaccion</div>";
        }
        
        header("Location: ".base_url."Metas/listaMetaEmpleado");
    }
    
    public function saveMetasEmpresa() {
        Utils::isMetas();
        $id_empresa = $_POST['id_empresa'];
        $nombre_meta = $_POST['nombre_meta'];
        $fecha_fin = $_POST['fecha_fin'];
        $descripcion = $_POST['descripcion'];
        $id_metaEmpresa = $_POST['id_meta_empresa'];
        
        $resultado1 = $_POST['resultado'];
        $comentario = $_POST['comentario'];
        $id_metaEmpleado = $_POST['id_meta_empresa'];

        $objMetaEmpresa = new Metas();
        
        
        if($id_metaEmpresa != 0){
            $objMetaEmpresa->setId($id_metaEmpleado);
            $objMetaEmpresa->setResultado($resultado1);
            $objMetaEmpresa->setComent_resultado($comentario);
            $resultado = $objMetaEmpresa->saveResultadoEmpresa();
    
       
        }else{
            $objMetaEmpresa->setId_empleado($id_empresa);
            $objMetaEmpresa->setNombre($nombre_meta);
            $objMetaEmpresa->setFecha_fin($fecha_fin);
            $objMetaEmpresa->setDescripcion($descripcion);
            $resultado = $objMetaEmpresa->saveMetaEmpresa();
            
         
        }
  
        if($resultado){
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Transaccion correcta</div>";
        }else{
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> Error en la transaccion</div>";
        }
        
        header("Location: ".base_url."Metas/listaMetaEmpresa");
    
    }
    


}
