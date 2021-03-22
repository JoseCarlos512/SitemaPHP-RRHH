<?php

class Empresa {

    private $id;
    private $nombre;
    private $url;
    private $logo;
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

    function getNombre() {
        return $this->nombre;
    }

    function getUrl() {
        return $this->url;
    }

    function getLogo() {
        return $this->logo;
    }

    function getNota() {
        return $this->nota;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    public function guardar() {
        $sql = "INSERT INTO empresa VALUES("
                . "null,"
                . "'{$this->getNombre()}',"
                . "'{$this->getUrl()}',"
                . "'{$this->getLogo()}',"
                . "'{$this->getNota()}',"
                . "'A')";
        $resultado = $this->db->query($sql);
        $estado = false;
        if ($resultado) {
            $estado = true;
        }
        return $estado;
    }

    public function getAllEmpresa() {
        $query = "select * from empresa";
        $resultado = $this->db->query($query);

        return $resultado;
    }

    public function deleteEmpresa() {
        $query = "  DELETE FROM empresa"
                . " WHERE id_comp = {$this->getId()}";
        $resultado = $this->db->query($query);
        $estado = false;
        if ($resultado) {
            $estado = true;
        }
        return $estado;
    }

    public function getDatosEmpresa() {
        $query = "SELECT * FROM empresa"
                . " WHERE id_comp = {$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function actualizar() {
        $query = "UPDATE empresa SET "
                . "nombre = '{$this->getNombre()}', "
                . "url = '{$this->getUrl()}', "
                . "nota = '{$this->getNota()}'";
        if ($this->getLogo() != null) {
            $query .= ", logo = '{$this->getLogo()}' ";
        }
        $query .= " WHERE id_comp = {$this->getId()}";

        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $query;
    }

}
