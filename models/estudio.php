<?php

class Estudio {
    
    private $id;
    private $id_empleado;
    private $nombre;
    private $nivel;
    private $institucion;
    private $nota;
    private $anho_inicio;
    private $anho_fin;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }
    
    function getId_empleado() {
        return $this->id_empleado;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getInstitucion() {
        return $this->institucion;
    }

    function getNota() {
        return $this->nota;
    }

    function getAnho_inicio() {
        return $this->anho_inicio;
    }

    function getAnho_fin() {
        return $this->anho_fin;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    function setAnho_inicio($anho_inicio) {
        $this->anho_inicio = $anho_inicio;
    }

    function setAnho_fin($anho_fin) {
        $this->anho_fin = $anho_fin;
    }
    
    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

    public function save() {
        
    }
    
    public function getEstudiosEmplado($id_empleado) {
        $sql =   " SELECT * FROM estudio "
               . " WHERE id_empleado=$id_empleado";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function saveEstudiosEmpleado() {
        $query = "INSERT INTO estudio VALUES ("

                . "'{$this->getNombre()}',"
                . "'{$this->getNivel()}',"
                . "'{$this->getInstitucion()}',"
                . "{$this->getNota()},"
                . "{$this->getAnho_inicio()},"
                . "{$this->getAnho_fin()},"
                . "{$this->getId_empleado()})";
        $result = $this->db->query($query);
        $estado = false;
        if($result){
            $estado = true;
        }
        return $estado;
    }
    
    public function getOneEstudio() {
        $query = "  SELECT * FROM estudio"
                . " WHERE estudio.id_estudio={$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function deleteOneEstudio() {
        
        $query = " DELETE FROM estudio"
               . " WHERE id_estudio={$this->getId()} ";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function updateEstudiosEmpleado() {
        $query = "UPDATE estudio SET "
                . "nombre = '{$this->getNombre()}',"
                . "nivel = '{$this->getNivel()}',"
                . "institucion = '{$this->getInstitucion()}',"
                . "nota = {$this->getNota()},"
                . "anho_inicio = {$this->getAnho_inicio()},"
                . "anho_fin = {$this->getAnho_fin()} "
                . "WHERE id_estudio={$this->getId()}";
        
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $query;
        
    }
}