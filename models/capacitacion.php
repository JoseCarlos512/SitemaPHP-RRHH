<?php

class Capacitacion {
    
    private $id;
    private $nombre;
    private $entrenador;
    private $tipo_conocimiento;
    private $nombre_certificado;
    private $institucion;
    private $fec_ini;
    private $fec_fin;
    private $comentario;
    private $code_capacitacion;
    private $estado;
    private $observacion;
    private $db;
    
    

        
    function __construct() {
        $this->db = Database::connect();
    }
    
    function setEntrenador($entrenador) {
        $this->entrenador = $entrenador;
    }
    
    function getEntrenador() {
        return $this->entrenador;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTipo_conocimiento() {
        return $this->tipo_conocimiento;
    }

    function getNombre_certificado() {
        return $this->nombre_certificado;
    }

    function getInstitucion() {
        return $this->institucion;
    }

    function getFec_ini() {
        return $this->fec_ini;
    }

    function getFec_fin() {
        return $this->fec_fin;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getCode_capacitacion() {
        return $this->code_capacitacion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTipo_conocimiento($tipo_conocimiento) {
        $this->tipo_conocimiento = $tipo_conocimiento;
    }

    function setNombre_certificado($nombre_certificado) {
        $this->nombre_certificado = $nombre_certificado;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }

    function setFec_ini($fec_ini) {
        $this->fec_ini = $fec_ini;
    }

    function setFec_fin($fec_fin) {
        $this->fec_fin = $fec_fin;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    function setCode_capacitacion($code_capacitacion) {
        $this->code_capacitacion = $code_capacitacion;
    }
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function getObservacion() {
        return $this->observacion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
    

    public function listaCapacitaciones() {
        $sql = "SELECT * FROM capacitacion";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function listaEmpleadosCapacitaciones() {
        $sql = "SELECT CONCAT(emp.nombre,' ',emp.apellido) empleado , emp.dni, capEmp.fecha_registro, capEmp.estado, emp.id_emp  
                FROM capacitacion_empleado capEmp 
                INNER JOIN empleado emp
                on emp.id_emp = capEmp.id_empleado";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function matricular($id_empleado,$id_capacitacion) {
        $sql = "INSERT INTO capacitacion_empleado  VALUES("
                . "NULL,"
                . "NULL,"
                . "$id_capacitacion,"
                . "$id_empleado,"
                . "CURDATE(),"
                . "1,"
                . "NULL)";
                
        $resultado = $this->db->query($sql); // or die("Error". mysqli_error($this->db))
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function deleteEmpleado($id_empleado) {
        $query = "  DELETE FROM capacitacion_empleado"
                . " WHERE id_empleado=$id_empleado";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function guardarCapacitacion() {
        $sql = "INSERT INTO capacitacion  VALUES("
                . "NULL,"
                . "'{$this->getNombre()}',"
                . "'{$this->getTipo_conocimiento()}',"
                . "'{$this->getNombre_certificado()}',"
                . "'{$this->getInstitucion()}',"
                . "'{$this->getFec_ini()}',"    
                . "'{$this->getFec_fin()}',"
                . "'{$this->getObservacion()}',"
                . "'{$this->getCode_capacitacion()}',"
                . "NULL,"
                . "'{$this->getEntrenador()}',"
                . "'{$this->getEstado()}')";
                
        $resultado = $this->db->query($sql); // or die("Error". mysqli_error($this->db))
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function getDatosCapacitacion() {
        $sql =    " SELECT * FROM capacitacion"
                . " WHERE id={$this->getId()}";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function updateCapacitacion() {
        $sql = "UPDATE capacitacion  SET"
                . " nombre='{$this->getNombre()}',"
                . " tipo_conocimiento='{$this->getTipo_conocimiento()}',"
                . " nombre_certificado='{$this->getNombre_certificado()}',"
                . " institucion='{$this->getInstitucion()}',"
                . " fec_ini='{$this->getFec_ini()}',"    
                . " fec_fin='{$this->getFec_fin()}',"
                . " Comentario='{$this->getObservacion()}',"
                . " cod_capacitacion='{$this->getCode_capacitacion()}',"
                . " silabus=NULL,"
                . " entrenador='{$this->getEntrenador()}',"
                . " estado={$this->getEstado()}"
                . " WHERE id={$this->getId()}";
        $resultado = $this->db->query($sql);
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $sql;
        
    }
    
    public function deleteCapacitacion() {
        $query = " DELETE FROM capacitacion"
                . " WHERE id={$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }

}

