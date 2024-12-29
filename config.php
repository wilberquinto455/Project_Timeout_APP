<?php

// Configuración de sesión según el entorno
if (!isset($_SESSION)) {
    $session_options = [
        'cookie_httponly' => true,
        'cookie_secure' => isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] !== 'localhost',
        'cookie_samesite' => 'Lax',
        'use_strict_mode' => true
    ];

    if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] !== 'localhost') {
        $session_options['cookie_domain'] = $_SERVER['HTTP_HOST'];
    }

    session_start($session_options);
}

// Incluir el helper de URLs
require_once(__DIR__ . '/config/url_helper.php');

// Definir la ruta base del proyecto
define('BASE_PATH', __DIR__);

// Configuración de la base de datos según el entorno
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] !== 'localhost') {
    // Configuración para Heroku
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    define('DB_HOST', $url["host"]);
    define('DB_NAME', substr($url["path"], 1));
    define('DB_USER', $url["user"]);
    define('DB_PASS', $url["pass"]);
} else {
    // Configuración local
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'timeout_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

// Función para obtener URLs
function get_url($path = '') {
    return get_base_url() . '/' . ltrim($path, '/');
}

// Función para incluir archivos desde la ruta base
function require_from_base($path) {
    require_once(BASE_PATH . '/' . ltrim($path, '/'));
}

// Función para redireccionar
function redirect($path) {
    header('Location: ' . get_url($path));
    exit();
}

// Función para verificar si el usuario está autenticado
function is_authenticated() {
    return isset($_SESSION['user_id']);
}

// Función para obtener el usuario actual del sistema
function get_timeout_user() {
    require_once(__DIR__ . '/model/Guest.php');
    
    if (!is_authenticated()) {
        return new Guest();
    }
    
    require_once(__DIR__ . '/model/User.php');
    $user = User::getById($_SESSION['user_id']);
    
    return $user ? $user : new Guest();
}

// Configuración de zona horaria
date_default_timezone_set('America/Lima');

// Configuración de errores según el entorno
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] !== 'localhost') {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Función para sanitizar entrada
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para generar un token CSRF
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Función para verificar el token CSRF
function verify_csrf_token($token) {
    if (!isset($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}
