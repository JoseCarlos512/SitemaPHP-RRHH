<?php

require_once 'models/usuario.php';
require_once 'models/permiso.php';

class usuarioController {

    public function index() {
        require_once 'views/usuario/login2.php';
    }

    public function login() {

        $usuario = new Usuario();
        $usuario->setUsuario($_POST["username"]);
        $usuario->setPassword($_POST["pass"]);

        $identity = $usuario->login();

        if ($identity && is_object($identity)) {

            $_SESSION['identity'] = $identity;
            if ($identity->rol == 'admin') {
                $_SESSION['admin'] = true;
            }

            //Obtenemos los permisos del usuario
            $permisos = new Permiso();
            $marcados = $permisos->listaMarcada($identity->id);

            //Declaramos el array para almacenar todos los permisos marcados
            $valores = array();

            //Almacenamos los permisos marcados en el array 'REVISAR BIEN ID_PERMISO'
            while ($per = $marcados->fetch_object()) {
                array_push($valores, $per->id_permiso);
            }

            //Determinamos los accesos del usuario
            in_array(1, $valores) ? $_SESSION['Escritorio'] = 1 : $_SESSION['Escritorio'] = 0;
            in_array(2, $valores) ? $_SESSION['Empleado'] = 1 : $_SESSION['Empleado'] = 0;
            in_array(3, $valores) ? $_SESSION['Empresa'] = 1 : $_SESSION['Empresa'] = 0;
            in_array(4, $valores) ? $_SESSION['Departamento'] = 1 : $_SESSION['Departamento'] = 0;
            in_array(5, $valores) ? $_SESSION['Acceso'] = 1 : $_SESSION['Acceso'] = 0;
            in_array(6, $valores) ? $_SESSION['Organigrama'] = 1 : $_SESSION['Organigrama'] = 0;
            in_array(7, $valores) ? $_SESSION['Configuracion'] = 1 : $_SESSION['Configuracion'] = 0;
            in_array(8, $valores) ? $_SESSION['Metas'] = 1 : $_SESSION['Metas'] = 0;
            in_array(9, $valores) ? $_SESSION['Capacitacion'] = 1 : $_SESSION['Capacitacion'] = 0;

            header("Location: " . base_url . "Usuario/dashboard");
        } else {
            $_SESSION['error_login'] = "Identificacion fallida";
            header("Location: " . base_url);
        }
    }

    public function logout() {
        session_destroy();
        header("Location: " . base_url);
    }

    public function dashboard() {

        if ($_SESSION['Escritorio']) {
            require_once 'views/dashboard.php';
        } else {
            header("Location: " . base_url);
        }
    }

    public function saveDatosPerfil() {
        if (isset($_SESSION['Empleado'])) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $psw = isset($_POST['password']) ? $_POST['password'] : false;
            $new_psw = isset($_POST['new_password']) ? $_POST['new_password'] : false;
            $con_new_psw = isset($_POST['confirm_new_password']) ? $_POST['confirm_new_password'] : false;

            $ObjUsuario = new Usuario();
            $identidad = $_SESSION['identity'];

            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                $filename = $file['name'];
                $ninetype = $file['type'];

                if ($ninetype == 'image/jpg' || $ninetype == 'image/jpeg' || $ninetype == 'image/png' || $ninetype == 'image/gif') {
                    if (!is_dir('images/usuario')) {
                        mkdir('images/perfil', 0777, TRUE);
                    }
                    move_uploaded_file($file['tmp_name'], 'images/usuario/' . $filename);
                    $ObjUsuario->setImagen($filename);
                }
            }

            if ($psw && $new_psw && $con_new_psw) {
                if ($psw === $identidad->password) {
                    if ($new_psw === $con_new_psw) {
                        $ObjUsuario->setPassword($psw);
                        $ObjUsuario->setNew_password($new_psw);
                        $ObjUsuario->setNombre($nombre);
                        $ObjUsuario->setEmail($email);
                        $ObjUsuario->setUsuario($identidad->usuario);
                    }
                } else {
                    $_SESSION['mensaje'] = "error";
                }
            } elseif (($nombre && $email) || $name_img) {
                $ObjUsuario->setPassword(null);
                $ObjUsuario->setNombre($nombre);
                $ObjUsuario->setEmail($email);
                $ObjUsuario->setUsuario($identidad->usuario);
            }


            $resultado = $ObjUsuario->saveDatosPerfil();

            if ($resultado) {
                $id = $_SESSION['identity']->id;
                $ObjUser = new Usuario();
                $ObjUser->setId($id);

                $datos = $ObjUser->getDatosUsuario();
                unset($_SESSION['identity']);
                $_SESSION['identity'] = $datos;

                $_SESSION['mensaje'] = "correct";
            } else {
                $_SESSION['mensaje'] = "error";
            }
            header("Location: " . base_url . "Usuario/perfil");
        } else {
            header("Location: " . base_url);
        }
    }

    public function perfil() {

        if ($_SESSION['Empleado']) {
            $id = $_SESSION['identity']->id;
            $ObjUser = new Usuario();
            $ObjUser->setId($id);

            $datos = $ObjUser->getDatosUsuario();
            require_once 'views/usuario/perfil.php';
        } else {
            header("Location: " . base_url);
        }
    }

    public function agregar() {
        if (isset($_SESSION['Acceso'])) {
            $permiso = new Permiso();
            $lista = $permiso->lista();
            require_once 'views/usuario/registrar.php';
        } else {
            header("Location: " . base_url);
        }
    }

    public function saveUsuario() {
        if (isset($_SESSION['Acceso'])) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $rol = isset($_POST['rol']) ? $_POST['rol'] : false;
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $psw = isset($_POST['clave']) ? $_POST['clave'] : false;
            $id = ($_POST['id'] != 0) ? true : false;
            $permisos = $_POST['permiso'] ? $_POST['permiso'] : false;
            
            $ObjUsuario = new Usuario();
            $ObjUsuario->setNombre($nombre);
            $ObjUsuario->setApellidos($apellidos);
            $ObjUsuario->setRol($rol);
            $ObjUsuario->setUsuario($usuario);
            $ObjUsuario->setEmail($email);
            $ObjUsuario->setPassword($psw);
            $ObjUsuario->setId($id);

            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                $filename = $file['name'];
                $ninetype = $file['type'];

                if ($ninetype == 'image/jpg' || $ninetype == 'image/jpeg' || $ninetype == 'image/png' || $ninetype == 'image/gif') {
                    if (!is_dir('images/usuario')) {
                        mkdir('images/usuario', 0777, TRUE);
                    }
                    move_uploaded_file($file['tmp_name'], 'images/usuario/' . $filename);
                    $ObjUsuario->setImagen($filename);
                }
            }
            // Permisos
            $objPermisos = new Permiso();
            
            
            //Evaluar si es actualizar o guardar
            if (!$id) {
                $getId = $ObjUsuario->saveDatosUsuario();
                $objPermisos->setId_usuario($getId);
                $resultadoPermiso = $objPermisos->saveUsuarioPermiso($permisos);
                
            } else {
                $objPermisos->setId_usuario($id);
                $resultado = $ObjUsuario->updateDatosUsuario();
                $resultadoPermiso = $objPermisos->updateUsuarioPermiso($permisos, $id);
            }

            if ($resultadoPermiso) {
                $_SESSION['mensaje'] = "correct";
            } else {
                $_SESSION['mensaje'] = "error";
            }
            header("Location: " . base_url . "Usuario/lista");
        } else {
            header("Location: " . base_url);
        }
    }

    public function lista() {
        if (isset($_SESSION['Acceso'])) {
            $ObjUsuario = new Usuario();
            $lista = $ObjUsuario->listaUsuarios();
            require_once 'views/usuario/lista.php';
        } else {
            header("Location: " . base_url);
        }
    }

    public function editarUsuario() {
        if ($_SESSION['Acceso']) {
            if (isset($_GET['id'])) {

                $objUsuario = new Usuario();
                $objUsuario->setId($_GET['id']);

                $rowUser = $objUsuario->getOneUsuario();

                //Datos de permisos
                $permiso = new Permiso();
                $lista = $permiso->lista();
                $listaMarcada = $permiso->listaMarcada($_GET['id']);

                //Declaramos el array para almacenar todos los permisos marcados
                $valores = array();
                //Almacenar los permisos asignados al usuario en el array
                while ($rows = mysqli_fetch_object($listaMarcada)) {
                    array_push($valores, $rows->id_permiso);
                }

                require_once 'views/usuario/registrar.php';
            } else {
                $_SESSION['mensaje'] = "error";
            }
        } else {
            header("Location: " . base_url);
        }
    }

    public function listaPermisos() {
        if (isset($_SESSION['Acceso'])) {
            $ObjPermiso = new Permiso();
            $lista = $ObjPermiso->lista();
            require_once 'views/usuario/listaPermisos.php';
        } else {
            header("Location: " . base_url);
        }
    }

    public function eliminarUsuario() {
        if ($_SESSION['Acceso']) {
            //Recibir id del usuario a eliminar
            $id_usuario = $_GET['id'];

            //Delete permisos del usuario
            $ObjPermiso = new Permiso();
            $ObjPermiso->setId_usuario($id_usuario);
            $permisos = $ObjPermiso->deletePermisosUsuario();

            //Delete usuario
            $ObjUsuario = new Usuario();
            $ObjUsuario->setId($id_usuario);
            $usuario = $ObjUsuario->deleteUsuario();

            if ($permisos && $usuario) {
                $_SESSION['mensaje'] = "correct";
            } else {
                $_SESSION['mensaje'] = "error";
            }

            header("Location:" . base_url . "Usuario/lista");
        } else {
            header("Location: " . base_url);
        }
    }

}
