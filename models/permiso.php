<?php

class Permiso {

    private $nombre;
    private $db;
    private $id_usuario;
    private $id_permiso;
    
    function __construct() {
        $this->db = Database::connect();
    }
    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_permiso() {
        return $this->id_permiso;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_permiso($id_permiso) {
        $this->id_permiso = $id_permiso;
    }

        
    public function lista() {
        $query = "select * from permiso";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function listaMarcada($id_usuario) {
        $query = "select * from usuario_permiso where id_usuario='$id_usuario'";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function saveUsuarioPermiso($permisos) {
        
        $num_elementos=0;
        while($num_elementos < count($permisos)){
            $query =  "INSERT INTO usuario_permiso(id_usuario, id_permiso) "
                    . "VALUES('{$this->getId_usuario()}',"
                    . " '$permisos[$num_elementos]')";
            $resultado = $this->db->query($query);
            $num_elementos++;
        }
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function updateUsuarioPermiso($permisos,$idusuario) {
        
        $sqldel="DELETE FROM usuario_permiso WHERE id_usuario='$idusuario'";
        $this->db->query($sqldel);
        
        $num_elementos=0;
        while($num_elementos < count($permisos)){
            $query =  "INSERT INTO usuario_permiso(id_usuario, id_permiso) "
                    . "VALUES('{$this->getId_usuario()}',"
                    . " '$permisos[$num_elementos]')";
            $resultado = $this->db->query($query);
            $num_elementos++;
        }
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function deletePermisosUsuario() {
        $sqldel="DELETE FROM usuario_permiso WHERE id_usuario='{$this->getId_usuario()}'";
        $resultado = $this->db->query($sqldel);
        return $resultado;
    }
}