<?php
class Conexion {
    // Configuración para localhost
    private $local_host = "localhost";
    private $local_user = "root";
    private $local_pass = "12345";
    private $local_db = "bd_sistemas_timeout";
    private $local_port = "3306";

    // Configuración para JawsDB
    private $jaws_host = "a07yd3a6okcidwap.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $jaws_user = "v4nive92llr404l7";
    private $jaws_pass = "dnqaorntbw0i0bi1";
    private $jaws_db = "yp3fyvs9gzzl2efq";
    private $jaws_port = "3306";

    private $conexion;
    private $is_production = false; // Cambiar a true para usar JawsDB

    public function __construct() {
        $host = $this->is_production ? $this->jaws_host : $this->local_host;
        $user = $this->is_production ? $this->jaws_user : $this->local_user;
        $pass = $this->is_production ? $this->jaws_pass : $this->local_pass;
        $db = $this->is_production ? $this->jaws_db : $this->local_db;
        $port = $this->is_production ? $this->jaws_port : $this->local_port;

        try {
            $this->conexion = new PDO(
                "mysql:host=" . $host . 
                ";port=" . $port . 
                ";dbname=" . $db,
                $user, 
                $pass
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET CHARACTER SET utf8");
            
            // Establecer la zona horaria
            $this->conexion->exec("SET time_zone = '-05:00'");
            $this->conexion->exec("SET SESSION sql_mode = ''");
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

    // Método original para mantener compatibilidad
    public function get_conexion() {
        return $this->conexion;
    }

    // Nuevo método con estilo camelCase
    public function getConexion() {
        return $this->get_conexion();
    }

    // Método para cambiar entre entornos
    public function setProduction($value) {
        $this->is_production = $value;
        // Reconectar con la nueva configuración
        $this->__construct();
    }
}
?>