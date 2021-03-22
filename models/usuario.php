<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellidos;
    private $usuario;
    private $email;
    private $password;
    private $new_password;
    private $conf_new_password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getEmail() {
        return $this->email;
    }

//Se cambio el metodo de encriptacion del set al get
    function getPassword() {
        return $this->password;
    }

    function getNew_password() {
        return $this->new_password;
    }

    function getConf_new_password() {
        return $this->conf_new_password;
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setUsuario($usuario) {
        $this->usuario = $this->db->real_escape_string($usuario);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNew_password($new_password) {
        $this->new_password = $new_password;
    }

    function setConf_new_password($conf_new_password) {
        $this->conf_new_password = $conf_new_password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function login() {
        $result = false;
        $user = $this->usuario;
        $password = $this->getPassword(); /* Password no se encripta */
        $sql = "SELECT usuarios.*, empleado.id_emp "
                . " FROM usuarios INNER JOIN empleado "
                . " on usuarios.id = empleado.id_usuario"
                . " where usuario = '$user'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {/* Devuelve la cantidad de filas encontradas */
            $usuario = $login->fetch_object(); /* Me da acceso lo que tiene dentro ese rs */
            //Compara cadena con datos encriptados
            $verificacion = password_verify($password, $usuario->password);
            if ($verificacion) { /* Verify , deberia dar true si el usuario es correcto */
                $result = $usuario; /* Guardar el objeto usuario dentro de resultado */
            }
        }
    return $result;
    }
    
    public function listaUsuarios() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function getDatosUsuario() {
        $query = "SELECT * FROM usuarios WHERE id ='{$this->getId()}'";
        $resultado = $this->db->query($query)->fetch_object();
        return $resultado;
    }

    public function saveDatosPerfil() {
        $password = $this->getPassword();
        $imagen = $this->getImagen();
        if (isset($imagen)) {
            if ($password != null) {
                $sql = "UPDATE usuarios SET nombre='{$this->getNombre()}', email='{$this->getEmail()}', "
                        . "password='{$this->getNew_password()}', imagen='$imagen' WHERE usuario='{$this->getUsuario()}' ";
            } else {
                $sql = "UPDATE usuarios SET nombre='{$this->getNombre()}', email='{$this->getEmail()}', "
                        . "imagen='$imagen' WHERE usuario='{$this->getUsuario()}' ";
            }
        } else {
            if ($password != null) {
                $sql = "UPDATE usuarios SET nombre='{$this->getNombre()}', email='{$this->getEmail()}', "
                        . "password='{$this->getNew_password()}' WHERE usuario='{$this->getUsuario()}' ";
            } else {
                $sql = "UPDATE usuarios SET nombre='{$this->getNombre()}', email='{$this->getEmail()}' "
                        . " WHERE usuario='{$this->getUsuario()}' ";
            }
        }

        $resultado = $this->db->query($sql);
        $estado = false;
        if ($resultado) {
            $estado = true;
        }
        return $sql;
    }
    
    public function saveDatosUsuario() {
        $password = password_hash($this->getPassword(), PASSWORD_BCRYPT, ['cost' => 4]);
        $query = "INSERT INTO usuarios VALUES("
                . "NULL,"
                . "'{$this->getNombre()}',"
                . "'{$this->getApellidos()}',"
                . "'{$this->getUsuario()}',"
                . "'{$this->getEmail()}',"
                . "'$password',"
                . "'{$this->getRol()}',"
                . "'{$this->getImagen()}',"
                . "1)";
        $resultado = $this->db->query($query);
        $id = $this->db->insert_id;
        /*$estado = false;
        if($resultado == true){
            $estado = true;
        }*/
        return $id;
    }
    
    //REVISAR DESPUES FETCH_OBJECT O MYSQLI_FECTH_OBJECT
    public function getOneUsuario() {
        $query = "SELECT * FROM usuarios "
                . "where "
                . "id = {$this->getId()} ";
        $resultado = $this->db->query($query);
        $resultado = $resultado->fetch_object();
         return $resultado;
    }

    public function updateDatosUsuario() {
        $password = password_hash($this->getPassword(), PASSWORD_BCRYPT, ['cost' => 4]);
        $query = " UPDATE usuarios "
                . " SET"
                        . " nombre = '{$this->getNombre()}',"
                        . " apellidos = '{$this->getApellidos()}',"
                        . " usuario = '{$this->getUsuario()}',"
                        . " email = '{$this->getEmail()}',"
                        . " password = '$password',"
                        . " rol = '{$this->getRol()}'";
                        
                        /*Comprobar si modificara la imagen*/
                         if($this->getImagen() != null){
                        $query .= ", imagen = '{$this->getImagen()}'";
                         }
                         
                        $query .= " WHERE id = {$this->getId()}";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $resultado;
    }
    
    public function deleteUsuario() {
        $query = "  DELETE FROM usuarios"
                . " WHERE id={$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }
}
