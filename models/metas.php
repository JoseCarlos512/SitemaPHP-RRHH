<?php

class Metas {

    private $id;
    private $id_empleado;
    private $oficina;
    private $nombre;
    private $fecha_fin;
    private $descripcion;
    private $resultado;
    private $coment_resultado;
    private $db;

    function __construct() {
        $this->db = Database::connect();
    }

    function getId_empleado() {
        return $this->id_empleado;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

        
    function getId() {
        return $this->id;
    }

    function getOficina() {
        return $this->oficina;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getResultado() {
        return $this->resultado;
    }

    function getComent_resultado() {
        return $this->coment_resultado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setOficina($oficina) {
        $this->oficina = $oficina;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    function setComent_resultado($coment_resultado) {
        $this->coment_resultado = $coment_resultado;
    }

    public function listaEmpresa() {
        $query = "  SELECT meta_empresa.*, empresa.nombre nombre_empresa FROM meta_empresa"
                . " INNER JOIN empresa"
                . " on empresa.id_comp=meta_empresa.id_empresa";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function listaDepartamento() {
        $query = "  SELECT meta_departamento.*, departamento.nombre nombre_departamento FROM meta_departamento"
                . " INNER JOIN departamento"
                . " on departamento.id_dep=meta_departamento.id_departamento";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function listaMetaEmpleado($idempleado) {
        $query = "  SELECT meta_empleado.*, empleado.nombre nombre_empleado FROM meta_empleado"
                . " INNER JOIN empleado"
                . " on empleado.id_emp=meta_empleado.id_empleado";
        if ($idempleado) {
            $query .= " WHERE meta_empleado.id_empleado=$idempleado";
        }
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function getDatosMetasEmpresa() {
        $query = "  SELECT meta_empresa.*, empresa.nombre nombre_empresa FROM meta_empresa"
                . " INNER JOIN empresa"
                . " on empresa.id_comp=meta_empresa.id_empresa"
                . " WHERE meta_empresa.id={$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function deleteEmpresaMeta() {
        $query = " DELETE FROM meta_empresa"
                . " WHERE id={$this->getId()} ";
        $resultado = $this->db->query($query);
        $estado = false;
        if ($resultado) {
            $estado = true;
        }
        return $estado;
    }

    public function getDatosMetasDepartamento() {
        $query = "  SELECT meta_departamento.*, departamento.nombre nombre_departamento FROM meta_departamento"
                . " INNER JOIN departamento"
                . " on departamento.id_dep=meta_departamento.id_departamento"
                . " WHERE meta_departamento.id={$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function deleteDepartamentoMeta() {
        $query = " DELETE FROM meta_departamento"
                . " WHERE id={$this->getId()} ";
        $resultado = $this->db->query($query);
        $estado = false;
        if ($resultado) {
            $estado = true;
        }
        return $estado;
    }

    public function getDatosMetasEmpleado() {
        $query = "  SELECT meta_empleado.*, empleado.nombre nombre_empleado FROM meta_empleado"
                . " INNER JOIN empleado"
                . " on empleado.id_emp=meta_empleado.id_empleado"
                . " WHERE meta_empleado.id={$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function deleteEmpleadoMeta() {
        $query = " DELETE FROM meta_empleado"
                . " WHERE id={$this->getId()} ";
        $resultado = $this->db->query($query);
        $estado = false;
        if ($resultado) {
            $estado = true;
        }
        return $estado;
    }
    
    public function saveMetaEmpleado() {
        $query = " INSERT INTO meta_empleado VALUES ( "
                . "NULL,"
                . "'{$this->getNombre()}',"
                . "'{$this->descripcion}',"
                . "'{$this->fecha_fin}',"
                . " 1, "
                . " NULL,"
                . "'{$this->getId_empleado()}')";
        $resultado = $this->db->query($query);
        
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function saveMetaEmpresa() {
        $query = " INSERT INTO meta_empresa VALUES ( "
                . "NULL,"
                . "'{$this->getNombre()}',"
                . "'{$this->descripcion}',"
                . "'{$this->fecha_fin}',"
                . " 1, "
                . " NULL,"
                . "'{$this->getId_empleado()}')";
        $resultado = $this->db->query($query);
        
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function saveResultado() {
        $query = " UPDATE meta_empleado SET "
                . " resultado = '{$this->getResultado()}',"
                . " comentario = '{$this->getComent_resultado()}'"
                . " WHERE id={$this->getId()}";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function saveResultadoEmpresa() {
        $query = " UPDATE meta_empresa SET "
                . " resultado = '{$this->getResultado()}',"
                . " comentario = '{$this->getComent_resultado()}'"
                . " WHERE id={$this->getId()}";
        $resultado = $this->db->query($query);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }

}
