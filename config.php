<?php

// Incluir el helper de URLs
require_once(__DIR__ . '/config/url_helper.php');

// Definir la ruta base del proyecto
define('BASE_PATH', __DIR__);

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'bd_sistemas_timeout');
define('DB_USER', 'root');
define('DB_PASS', '12345');

// Función para obtener URLs
function get_url($path = '') {
    return asset_url($path);
}

// Función para incluir archivos desde la ruta base
function require_from_base($path) {
    require_once(BASE_PATH . '/' . $path);
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
    require_once(BASE_PATH . '/model/User.php');
    require_once(BASE_PATH . '/model/Guest.php');
    
    if (is_authenticated()) {
        return User::getById($_SESSION['ID_User']);
    }
    return new Guest();
}

// Configuración de zona horaria
date_default_timezone_set('America/Lima');

// Configuración de sesión
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
if (is_production()) {
    ini_set('session.cookie_secure', 1);
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración de errores
if (!is_production()) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
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
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    return true;
}
