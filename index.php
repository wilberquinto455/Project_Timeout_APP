<?php
// Incluir configuración global
require_once(__DIR__ . '/config.php');

// Configurar el logging
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/php_errors.log');
error_reporting(E_ALL);

// Función de logging personalizada
function logDebug($message, $data = null) {
    $logMessage = date('Y-m-d H:i:s') . " - " . $message;
    if ($data !== null) {
        $logMessage .= " - Data: " . print_r($data, true);
    }
    error_log($logMessage);
}

// Logging de variables del servidor importantes
logDebug("SERVER Variables:", $_SERVER);

// Determinar la base URL
$isLocalhost = ($_SERVER['HTTP_HOST'] === 'localhost');
$basePath = $isLocalhost ? '/Timeout' : '';
define('BASE_URL', $basePath);

logDebug("Base URL determined as: " . BASE_URL);

// Obtener la URI actual
$requestUri = $_SERVER['REQUEST_URI'];
logDebug("Original Request URI: " . $requestUri);

// Limpiar la URI
$cleanUri = parse_url($requestUri, PHP_URL_PATH);
$cleanUri = str_replace(BASE_URL, '', $cleanUri);
$cleanUri = trim($cleanUri, '/');

logDebug("Cleaned URI: " . $cleanUri);

// Incluir el archivo de rutas
require_once 'routes.php';

// Obtener todas las rutas disponibles
$availableRoutes = array_keys($routes);
logDebug("Available routes:", $availableRoutes);

// Buscar la ruta correspondiente
$routeFound = false;
$matchedRoute = '';

foreach ($routes as $route => $handler) {
    // Normalizar la ruta actual y la ruta definida
    $normalizedRoute = trim($route, '/');
    $normalizedUri = $cleanUri;
    
    logDebug("Comparing route: '{$normalizedRoute}' with URI: '{$normalizedUri}'");
    
    if ($normalizedRoute === $normalizedUri) {
        $routeFound = true;
        $matchedRoute = $route;
        break;
    }
}

if ($routeFound) {
    logDebug("Route found: " . $matchedRoute);
    $handler = $routes[$matchedRoute];
    
    // Si el handler es un array, asumimos que tiene 'layout' => true/false
    if (is_array($handler)) {
        $useLayout = $handler['layout'] ?? true;
        $viewFile = $handler['view'];
    } else {
        $useLayout = true;
        $viewFile = $handler;
    }
    
    logDebug("Handler details:", [
        'useLayout' => $useLayout,
        'viewFile' => $viewFile,
        'fileExists' => file_exists($viewFile)
    ]);
    
    if ($useLayout) {
        require_once 'view/components/header.php';
    }
    
    require_once $viewFile;
    
    if ($useLayout) {
        require_once 'view/components/footer.php';
    }
} else {
    logDebug("No route found for URI: " . $cleanUri);
    http_response_code(404);
    require_once 'view/pages/404.php';
}