<?php

require_once 'models/empresa.php';

class empresaController {

    public function registrar() {
        Utils::isEmpresa();
        $ObjLst = new Empresa();
        $lista = $ObjLst->getAllEmpresa();
        require_once 'views/empresa/registrar.php';
    }

    public function guardar() {
        Utils::isEmpresa();
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $url = isset($_POST['url']) ? $_POST['url'] : "";
        $nota = isset($_POST['nota']) ? $_POST['nota'] : "";
        $id = $_POST['id'];

        $ObjEmpresa = new Empresa();
        $ObjEmpresa->setNombre($nombre);
        $ObjEmpresa->setUrl($url);
        $ObjEmpresa->setNota($nota);

        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $filename = $file['name'];
            $ninetype = $file['type'];

            if ($ninetype == 'image/jpg' || $ninetype == 'image/jpeg' || $ninetype == 'image/png' || $ninetype == 'image/gif') {
                if (!is_dir('images/usuario')) {
                    mkdir('images/empresa', 0777, TRUE);
                }
                move_uploaded_file($file['tmp_name'], 'images/empresa/' . $filename);
                $ObjEmpresa->setLogo($filename);
            }
        }

        if ($id == 0) {
            $estado = $ObjEmpresa->guardar();
        } else {
            $ObjEmpresa->setId($id);
            $estado = $ObjEmpresa->actualizar();
        }

        if ($estado) {
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Transaccion correcta</div>";
        } else {
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> Error en la transaccion</div>";
        }
        header("Location: " . base_url . "Empresa/listaEmpresas");
    }

    public function listaEmpresas() {
        Utils::isEmpresa();
        $ObjLst = new Empresa();
        $lista = $ObjLst->getAllEmpresa();
        require_once 'views/empresa/listaEmpresas.php';
    }

    public function getDatosEmpresa() {
        Utils::isEmpresa();
        $idempresa = $_GET['id'];
        $objEmpresa = new Empresa();
        $objEmpresa->setId($idempresa);
        $row = $objEmpresa->getDatosEmpresa()->fetch_object();

        require_once 'views/empresa/registrar.php';
    }

    public function eliminarDatosEmpresa() {
        Utils::isEmpresa();
        $idempresa = $_GET['id'];
        $objEmpresa = new Empresa();
        $objEmpresa->setId($idempresa);
        $resultado = $objEmpresa->deleteEmpresa();
        if ($resultado) {
            $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'> Empresa eliminada correctamente </div>";
        } else {
            $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'> No se pudo eliminar la empresa </div>";
        }
        header("Location: " . base_url . "Empresa/listaEmpresas");
    }

}
