<?php
// Habilitar el reporte de errores para debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir archivos de configuración
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/config/assets.php');
require_once(__DIR__ . '/routes.php');

// Obtener la instancia del router
$router = Router::getInstance();

// Obtener la URL actual
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Determinar el base path según el entorno
$basePath = is_production() ? '' : '/Timeout';

// Remover el base path y limpiar la URL
$url = trim(substr($requestUri, strlen($basePath)), '/');

// Debug info
error_log("Request URI: " . $requestUri);
error_log("Base Path: " . $basePath);
error_log("Cleaned URL: " . $url);

// Obtener la ruta correspondiente
$route = $router->match($url);

// Debug info
error_log("Route found: " . ($route ? "yes" : "no"));

// Ejecutar la ruta correspondiente
if ($route) {
    if (is_callable($route)) {
        error_log("Executing callable route");
        call_user_func($route);
    } else if (is_string($route)) {
        $filePath = __DIR__ . '/view/client-side/' . $route . '.php';
        error_log("Looking for file: " . $filePath);
        if (file_exists($filePath)) {
            error_log("File exists, including it");
            require_once($filePath);
        } else {
            error_log("File does not exist, showing 404");
            http_response_code(404);
            require_once(__DIR__ . '/view/pages/404.php');
        }
    }
} else if ($url === '') {
    error_log("Empty URL, showing home page");
    // Página principal
    $pageTitle = 'Inicio';
    require_once(__DIR__ . '/view/components/header.php');
?>
    <section class="d-flex">
        <!-- Sidebar -->
        <?php require_once(__DIR__ . '/view/components/sidebar.php'); ?>

        <div class="main-content">
            <!-- Mobile Nav -->
            <?php require_once(__DIR__ . '/view/components/mobile-nav.php'); ?>

            <!-- Main Carousel -->
            <?php require_once(__DIR__ . '/view/components/carousel.php'); ?>

            <!-- Welcome Section -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-4">Bienvenido a TIMEOUT</h1>
                        <p class="text-center">
                            Sistema de gestión de tiempos y cronómetros para una mejor productividad.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="container mb-5">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-clock"></i> Control de Tiempo</h5>
                                <p class="card-text">Gestiona tus tiempos de manera eficiente con nuestro sistema de cronómetros.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-chart-line"></i> Estadísticas</h5>
                                <p class="card-text">Visualiza tus datos y mejora tu productividad con nuestras herramientas analíticas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-users"></i> Colaboración</h5>
                                <p class="card-text">Trabaja en equipo y comparte información de manera segura y eficiente.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php require_once(__DIR__ . '/view/components/footer.php'); ?>
        </div>
    </section>
<?php
} else {
    error_log("No route found for URL: " . $url);
    // Si no se encuentra la ruta, mostrar página 404
    http_response_code(404);
    require_once(__DIR__ . '/view/pages/404.php');
}