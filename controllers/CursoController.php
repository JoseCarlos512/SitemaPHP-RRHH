<?php

require_once 'models/curso.php';

class cursoController {

    public function registrar() {
        Utils::isEmpleado();
        $id_empleado = $_SESSION['identity']->id_emp;
        $curso = new Curso();
        $lista = $curso->getCursoEmplado($id_empleado);

        require_once 'views/empleado/curso/registrar.php';
    }

    public function saveCurso() {
        Utils::isEmpleado();
        $id_empleado = $_SESSION['identity']->id_emp;
        $nombre = $_POST['nombre'];
        $duracion = $_POST['duracion'];
        $tipo_duracion = $_POST['tipo_duracion'];
        $fecha_inicio = $_POST['fec_ini'];
        $fecha_fin = $_POST['fec_fin'];
        $grado = $_POST['grado'];
        $nivel = $_POST['nivel'];
        $comentario = $_POST['comentario'];

        $ObjCursoEmpleado = new Curso();

        $ObjCursoEmpleado->setNombre($nombre);
        $ObjCursoEmpleado->setDuracion($duracion);
        $ObjCursoEmpleado->setTipo_duracion($tipo_duracion);
        $ObjCursoEmpleado->setFec_inicio($fecha_inicio);
        $ObjCursoEmpleado->setFec_fin($fecha_fin);
        $ObjCursoEmpleado->setGrado($grado);
        $ObjCursoEmpleado->setNivel($nivel);
        $ObjCursoEmpleado->setComentario($comentario);

        $resultado = $ObjCursoEmpleado->saveCursoEmpleado($id_empleado);

        $lista = $ObjCursoEmpleado->getCursoEmplado($id_empleado);

        require_once 'views/empleado/curso/registrar.php';
    }

    public function editarCurso() {
        Utils::isEmpleado();
        $idcurso = $_GET['id'];
        $objCurso = new Curso();
        $row = $objCurso->getOneCurso($idcurso)->fetch_object();

        $id_empleado = $_SESSION['identity']->id_emp;
        $lista = $objCurso->getCursoEmplado($id_empleado);

        require_once 'views/empleado/curso/registrar.php';
    }

    public function eliminarCurso() {
        Utils::isEmpleado();
        $idcurso = $_GET['id'];
        $objCurso = new Curso();
        $estado = $objCurso->deleteOneCurso($idcurso);

        $id_empleado = $_SESSION['identity']->id_emp;
        $lista = $objCurso->getCursoEmplado($id_empleado);

        require_once 'views/empleado/curso/registrar.php';
    }

    public function updateCurso($param) {
        
    }

}
