<?php

class Curso {

    private $nombre;
    private $duracion;
    private $tipo_duracion;
    private $fec_inicio;
    private $fec_fin;
    private $grado;
    private $nivel;
    private $document;
    private $comentario;
    private $db;
    
        
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getComentario() {
        return $this->comentario;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    
    function getNombre() {
        return $this->nombre;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function getTipo_duracion() {
        return $this->tipo_duracion;
    }

    function getFec_inicio() {
        return $this->fec_inicio;
    }

    function getFec_fin() {
        return $this->fec_fin;
    }

    function getGrado() {
        return $this->grado;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getDocument() {
        return $this->document;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setTipo_duracion($tipo_duracion) {
        $this->tipo_duracion = $tipo_duracion;
    }

    function setFec_inicio($fec_inicio) {
        $this->fec_inicio = $fec_inicio;
    }

    function setFec_fin($fec_fin) {
        $this->fec_fin = $fec_fin;
    }

    function setGrado($grado) {
        $this->grado = $grado;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setDocument($document) {
        $this->document = $document;
    }

    
    public function getCursoEmplado($id_empleado) {
        $sql =   " SELECT * FROM curso "
               . " WHERE id_empleado=$id_empleado";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function saveCursoEmpleado($id_empleado) {
        $query = "INSERT INTO curso VALUES ("
                . "null,"
                . "'{$this->getNombre()}',"
                . "'{$this->getDuracion()}',"
                . "'{$this->getTipo_duracion()}',"
                . "'{$this->getFec_inicio()}',"
                . "'{$this->getFec_fin()}',"
                . "'{$this->getGrado()}',"
                . "'{$this->getNivel()}',"
                . "'archivo.pdf',"
                . "$id_empleado,"
                . "'{$this->getComentario()}')";
                
        $result = $this->db->query($query);
        $estado = false;
        if($result){
            $estado = true;
        }
        return $estado;
    }
    
    public function getOneCurso($id_curso) {
        $query = "  SELECT * FROM curso"
                . " WHERE curso.id_curso=$id_curso";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function deleteOneCurso($id_curso) {
        
        $query = " DELETE FROM curso"
               . " WHERE id_curso=$id_curso ";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
}