<?php
// Forzar el entorno de Railway para pruebas
putenv('RAILWAY_ENVIRONMENT=production');
putenv('MYSQL_URL=mysql://root:lliIsSMRDYWeKPUQwhPzqoxIZQnJiZSK@junction.proxy.rlwy.net:17301/railway');

require_once 'model/conexion.php';

try {
    // Intentar crear una nueva conexión
    $db = new Conexion();
    echo "¡Conexión exitosa!\n";
    
    // Probar el conteo de usuarios
    $total = $db->testConnection();
    echo "\nTotal de usuarios en la base de datos: " . $total . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    
    // Mostrar variables de entorno para debug
    echo "\nVariables de entorno:\n";
    echo "RAILWAY_ENVIRONMENT: " . getenv('RAILWAY_ENVIRONMENT') . "\n";
    echo "MYSQL_URL: " . getenv('MYSQL_URL') . "\n";
}
