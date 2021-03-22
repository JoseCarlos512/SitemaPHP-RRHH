<?php

require_once 'models/empleado.php';

class empleadoController {

    public function index() {
        
    }

    public function registrar() {
        Utils::isEmpleado();
        require_once 'views/empleado/registrar.php';
    }

    public function guardar() {
        Utils::isEmpleado();
        $empleado = new Empleado();

        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
        $genero = isset($_POST['genero']) ? $_POST['genero'] : "";
        $fechaNacimiento = isset($_POST['fechan']) ? $_POST['fechan'] : NULL;
        $fechaDescenso = isset($_POST['fechad']) ? $_POST['fechad'] : NULL;
        $status = isset($_POST['status']) ? $_POST['status'] : NULL;
        $emailWork = isset($_POST['emailc']) ? $_POST['emailc'] : "";
        $puesto = isset($_POST['puesto']) ? $_POST['puesto'] : "";
        $pago = isset($_POST['pago']) ? $_POST['pago'] : "";
        $dni = isset($_POST['dni']) ? $_POST['dni'] : NULL;
        $emailPersonal = isset($_POST['emailp']) ? $_POST['emailp'] : "";
        $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : "";
        $jefe_directo = isset($_POST['id_jefe_empleado']) ? $_POST['id_jefe_empleado'] : "";
        $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
        $id = $_POST['id'];

      
        $empleado->setNombre($nombre);
        $empleado->setApellido($apellido);
        $empleado->setGenero($genero);
        $empleado->setFecha_nac($fechaNacimiento);
        $empleado->setFecha_des($fechaDescenso);
        $empleado->setStatus($status);
        $empleado->setEmail_work($emailWork);
        $empleado->setPuesto($puesto);
        $empleado->setPago($pago);
        $empleado->setDni($dni);
        $empleado->setEmail_personal($emailPersonal);
        $empleado->setDomicilio($domicilio);
        $empleado->setEstado($estado);
        $empleado->setJefe_directo($jefe_directo);
        
        
        if ($id != 0) {
            $empleado->setId_empleado($id);
            $estado = $empleado->updateEmpleado();
            
     
        } else {
            $estado = $empleado->guardar();
            
            var_dump($estado);
            exit;
            
            
        }


        if ($estado) {
            $_SESSION['mensaje'] = "correct";
        } else {
            $_SESSION['mensaje'] = "error";
        }

        header("Location: " . base_url . "Empleado/listar");
    }

    public function listar() {
        Utils::isEmpleado();
        $empleado = new Empleado();
        $lista = $empleado->listar();
        require_once 'views/empleado/listar.php';
    }

    public function editarEmpleado() {
        Utils::isEmpleado();
        $id_empleado = $_GET['id'];

        $ObjEmpleado = new Empleado();
        $ObjEmpleado->setId_empleado($id_empleado);
        $row = $ObjEmpleado->getOneEmpleado()->fetch_object();
        
        $resultado = $ObjEmpleado->listar();

        require_once 'views/empleado/registrar.php';
    }

    public function deleteEmpleado() {
        Utils::isEmpleado();
        $id_empleado = $_GET['id'];
        $ObjEmpleado = new Empleado();
        $ObjEmpleado->setId_empleado($id_empleado);
        $ObjEmpleado->deleteEmpleado();

        $lista = $ObjEmpleado->listar();
        require_once 'views/empleado/listar.php';
    }

    public function misDatosEmpleado() {
        Utils::isEmpleado();
        $id_empleado = $_SESSION['identity']->id_emp;
        header("Location: " . base_url . "Empleado/editarEmpleado&id=" . $id_empleado);
    }
    
    public function organigrama() {
        Utils::isOrganigrama();
        require_once 'views/organigrama/empleado.php';
    }

}
