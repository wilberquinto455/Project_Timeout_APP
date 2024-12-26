<?php
// Incluir archivos de configuración
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/config/assets.php');
require_once(__DIR__ . '/routes.php');

// Obtener la instancia del router
$router = Router::getInstance();

// Obtener la URL actual
$url = trim($_SERVER['REQUEST_URI'], '/');
$route = $router->match($url);

// Si no hay ruta específica o es la ruta principal, mostramos la interfaz por defecto
if (!$route || $url === '') {
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
    // Ejecutar la ruta correspondiente
    $router->execute($route);
}
?>