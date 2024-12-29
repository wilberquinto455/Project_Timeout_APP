<?php
class Conexion {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $port;
    private $conexion;

    public function __construct() {
        // Cargar configuración según el entorno
        $this->loadConfig();

        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db}";
            
            // Imprimir información de debug
            error_log("Intentando conectar a: " . $dsn);
            error_log("Usuario: " . $this->user);
            
            $this->conexion = new PDO(
                $dsn,
                $this->user,
                $this->pass,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
            
            error_log("Conexión exitosa a la base de datos");
            
            // Establecer la zona horaria
            $this->conexion->exec("SET time_zone = '-05:00'");
            
        } catch(PDOException $e) {
            error_log("Error de conexión a la base de datos: " . $e->getMessage());
            throw new Exception("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    private function loadConfig() {
        // Verificar si estamos en Railway
        if (getenv('RAILWAY_ENVIRONMENT') !== false) {
            $mysql_url = getenv('MYSQL_URL');
            if ($mysql_url) {
                $url = parse_url($mysql_url);
                $this->host = $url['host'];
                $this->user = $url['user'];
                $this->pass = $url['pass'];
                $this->db = substr($url['path'], 1);
                $this->port = isset($url['port']) ? $url['port'] : '3306';
            } else {
                $this->host = getenv('MYSQLHOST');
                $this->user = getenv('MYSQLUSER');
                $this->pass = getenv('MYSQLPASSWORD');
                $this->db = getenv('MYSQLDATABASE');
                $this->port = getenv('MYSQLPORT');
            }
        } 
        // Si no, usar configuración local
        else {
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '12345';
            $this->db = 'bd_sistemas_timeout';
            $this->port = '3306';
        }
    }

    public function get_conexion() {
        if (!$this->conexion) {
            throw new Exception("No hay conexión establecida con la base de datos");
        }
        return $this->conexion;
    }

    public function getConnection() {
        return $this->conexion;
    }

    // Método para probar la conexión
    public function testConnection() {
        try {
            $query = $this->conexion->query("SELECT COUNT(*) as total FROM usuarios");
            $result = $query->fetch();
            return $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Error al ejecutar consulta: " . $e->getMessage());
        }
    }
}
?>