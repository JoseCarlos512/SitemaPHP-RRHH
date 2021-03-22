<?php

class Departamento {
    
    private $id;
    private $codigo_compañia;
    private $abreviatura;
    private $nombre;
    private $nota;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
        
    function getCodigo_compañia() {
        return $this->codigo_compañia;
    }

    function getAbreviatura() {
        return $this->abreviatura;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNota() {
        return $this->nota;
    }

    function setCodigo_compañia($codigo_compañia) {
        $this->codigo_compañia = $codigo_compañia;
    }

    function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    public function getAllDepartamento() {
        $query = "SELECT emp.nombre as empresa, dep.id_dep, dep.abreviatura, dep.nombre, dep.nota, dep.estado
                  FROM departamento dep
                  inner join empresa emp
                  on dep.id_comp = emp.id_comp";
        $lista = $this->db->query($query);
        return $lista;
    }
    
    public function saveDepartamento() {
        $query = "INSERT INTO departamento values("
                . "{$this->getCodigo_compañia()},"
                . "null,"
                . "'{$this->getAbreviatura()}',"
                . "'{$this->getNombre()}',"
                . "'{$this->getNota()}',"
                . "1)";
        $resultado = $this->db->query($query);
        $estado = false;
        if(isset($resultado)){
            $estado = true;
        }
        return $estado;
           
    }
    
    public function getDatosOrganigrama() {
        $sql = "select id as memberId, parent as parentId  ,user as otherInfo from users";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function deleteDepartamento() {
        $query = "DELETE FROM departamento "
                . "WHERE id_dep ={$this->getId()}";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function getDatosDepartamento() {
        $query = "SELECT * FROM departamento "
                . "WHERE id_dep = {$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function actualizarDatosDepartamento() {
        $query = "UPDATE departamento SET "
                . "id_comp = {$this->getCodigo_compañia()}, "
                . "abreviatura = '{$this->getAbreviatura()}', "
                . "nombre = '{$this->getNombre()}', "
                . "nota = '{$this->nota}' "
                . "WHERE id_dep = {$this->getId()}";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }

} 