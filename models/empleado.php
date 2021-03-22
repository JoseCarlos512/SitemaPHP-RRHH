<?php

class Empleado {
    
    private $id_empleado;
    private $nombre;
    private $apellido;
    private $genero;
    private $fecha_nac;
    private $fecha_des;
    private $status;
    private $email_work;
    private $email_personal;
    private $puesto;
    private $pago;
    private $dni;
    private $domicilio;
    private $busqueda;
    private $jefe_directo;
    private $estado;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }

    function getJefe_directo() {
        return $this->jefe_directo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setJefe_directo($jefe_directo) {
        $this->jefe_directo = $jefe_directo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        
    function getBusqueda() {
        return $this->busqueda;
    }
 
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getGenero() {
        return $this->genero;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getFecha_des() {
        return $this->fecha_des;
    }

    function getStatus() {
        return $this->status;
    }

    function getEmail_work() {
        return $this->email_work;
    }

    function getEmail_personal() {
        return $this->email_personal;
    }

    function getPuesto() {
        return $this->puesto;
    }

    function getPago() {
        return $this->pago;
    }

    function getDni() {
        return $this->dni;
    }

    function getDomicilio() {
        return $this->domicilio;
    }
    
    function getId_empleado() {
        return $this->id_empleado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setFecha_des($fecha_des) {
        $this->fecha_des = $fecha_des;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setEmail_work($email_work) {
        $this->email_work = $email_work;
    }

    function setEmail_personal($email_personal) {
        $this->email_personal = $email_personal;
    }

    function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    function setPago($pago) {
        $this->pago = $pago;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }
    
    function setBusqueda($busqueda) {
        $this->busqueda = $busqueda;
    }

    
    function guardar() {
        $sql = "INSERT INTO empleado VALUES("
                . "NULL,"
                . "'{$this->getNombre()}',"
                . "'{$this->getApellido()}',"
                . "'{$this->getGenero()}',"
                . "'{$this->getFecha_nac()}',"
                . "'{$this->getFecha_des()}',"
                . "1,"
                . "'{$this->getEmail_work()}',"
                . "'{$this->getPuesto()}',"
                . "'{$this->getPago()}',"
                . "'{$this->getDni()}',"
                . "'{$this->getEmail_personal()}',"
                . "'{$this->getDomicilio()}',"
                . "NULL,"
                . "NULL)";
                
        $resultado = $this->db->query($sql); // or die("Error". mysqli_error($this->db))
        $estado = false;
        if($resultado){
            $estado = true;
        }
        return $estado;
    }
    
    public function listar() {
        $sql = "SELECT * FROM empleado";
        $rsLista = $this->db->query($sql);
        return $rsLista;
    }
    
    public function getNombreJefe($id_jefe) {
        $sql = "SELECT nombre FROM empleado WHERE id_emp=$id_jefe";
        $rsLista = $this->db->query($sql);
        return $rsLista;
    }
    
    public function getOneEmpleado() {
        $query = " SELECT * FROM empleado"
               . " WHERE id_emp = {$this->getId_empleado()}";
        $result = $this->db->query($query);
        return $result;
    }
    
    public function updateEmpleado() {
        $query =  " UPDATE empleado SET"
                . " nombre='{$this->getNombre()}',"
                . " apellido='{$this->getApellido()}',"
                . " genero='{$this->getGenero()}',"
                . " fec_nac='{$this->getFecha_nac()}',"
                . " fec_des='{$this->getFecha_des()}',"
                . " email_work='{$this->getEmail_work()}',"
                . " puesto='{$this->getPuesto()}',"
                . " pago='{$this->getPago()}',"
                . " dni='{$this->getDni()}',"
                . " email_per='{$this->getEmail_personal()}',"
                . " domicilio='{$this->getDomicilio()}',"
                . " jefe_directo = '{$this->getJefe_directo()}', "
                . " estado = '{$this->getEstado()}' "
                . " WHERE id_emp={$this->getId_empleado()}";
        $result = $this->db->query($query);
        $estado = false;
        if($result){
            $estado = true;
        }
        return $query;
    }
    
    public function buscar() {
        $query = "SELECT * FROM empleado WHERE 
                    nombre LIKE '%{$this->getBusqueda()}%' OR
                    apellido LIKE '%{$this->getBusqueda()}%' OR
                    dni LIKE '%{$this->getBusqueda()}%' OR
                    puesto LIKE '%{$this->getBusqueda()}%' ";
        $rs = $this->db->query($query);
        return $rs;
    }
    
    public function deleteEmpleado() {
        $query = " DELETE FROM empleado"
               . " WHERE id_emp={$this->getId_empleado()}";
        $rs = $this->db->query($query);
        return $rs;
    }

}