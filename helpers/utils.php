<?php

class utils {

    public static function deleteSession($nombre) {
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }
        return $nombre;
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            header("Location: " . base_url);
        } else {
            return true;
        }
    }

    public static function isUsuario() {
        if (!isset($_SESSION['Acceso'])) {
            unset($_SESSION['Acceso']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        }
        return true;
    }

    public static function isEmpleado() {
        if (!isset($_SESSION['Empleado'])) {
            unset($_SESSION['Empleado']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        } else {
            return true;
        }
    }
    
    public static function isCapacitacion() {
        if (!isset($_SESSION['Capacitacion'])) {
            unset($_SESSION['Capacitacion']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        } else {
            return true;
        }
    }
    
    public static function isDepartamento() {
        if (!isset($_SESSION['Departamento'])) {
            unset($_SESSION['Departamento']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        } else {
            return true;
        }
    }
    
    public static function isEmpresa() {
        if (!isset($_SESSION['Empresa'])) {
            unset($_SESSION['Empresa']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        } else {
            return true;
        }
    }
    
    public static function isMetas() {
        if (!isset($_SESSION['Metas'])) {
            unset($_SESSION['Metas']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        } else {
            return true;
        }
    }
    
    public static function isOrganigrama() {
        if (!isset($_SESSION['Organigrama'])) {
            unset($_SESSION['Organigrama']);
            if (isset($_SESSION)) {
                header("Location: " . base_url . "Error/index");
            } else {
                header("Location: " . base_url);
            }
        } else {
            return true;
        }
    }

}
