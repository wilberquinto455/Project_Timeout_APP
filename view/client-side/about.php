<?php
$pageTitle = 'Acerca de';
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php');
require_once(__DIR__ . '/../../view/components/header.php');
?>

<section class="d-flex">
    <!-- Sidebar -->
    <?php require_once(__DIR__ . '/../../view/components/sidebar.php'); ?>

    <div class="main-content">
        <!-- Mobile Nav -->
        <?php require_once(__DIR__ . '/../../view/components/mobile-nav.php'); ?>

        <!-- About Content -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Sección de Introducción -->
                    <div class="text-center mb-5">
                        <h1 class="display-4 mb-4">Acerca de TIMEOUT</h1>
                        <div class="separator mx-auto mb-4"></div>
                        <p class="lead text-muted">
                            Sistema integral de gestión de tiempos y documentos para optimizar la productividad empresarial
                        </p>
                    </div>

                    <!-- Características Principales -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-clock fa-3x text-primary"></i>
                                    </div>
                                    <h3 class="h4 mb-3">Control de Tiempo</h3>
                                    <p class="text-muted mb-0">
                                        Gestiona eficientemente los tiempos de tus procesos y actividades
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-file-alt fa-3x text-primary"></i>
                                    </div>
                                    <h3 class="h4 mb-3">Gestión Documental</h3>
                                    <p class="text-muted mb-0">
                                        Organiza y controla todos tus documentos en un solo lugar
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-chart-line fa-3x text-primary"></i>
                                    </div>
                                    <h3 class="h4 mb-3">Análisis y Reportes</h3>
                                    <p class="text-muted mb-0">
                                        Obtén insights valiosos con nuestras herramientas analíticas
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nuestra Misión -->
                    <div class="row align-items-center mb-5">
                        <div class="col-md-6">
                            <h2 class="mb-4">Nuestra Misión</h2>
                            <p class="text-muted">
                                En TIMEOUT, nos dedicamos a proporcionar soluciones innovadoras para la gestión del tiempo y documentos, 
                                ayudando a las empresas a optimizar sus procesos y aumentar su productividad.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Optimización de procesos empresariales
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Control y seguimiento en tiempo real
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-primary me-2"></i>
                                    Mejora continua y adaptabilidad
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 bg-light rounded-3">
                                <h3 class="h4 mb-3">¿Por qué elegirnos?</h3>
                                <div class="progress mb-3" style="height: 25px;">
                                    <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                        Eficiencia 95%
                                    </div>
                                </div>
                                <div class="progress mb-3" style="height: 25px;">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                        Satisfacción 90%
                                    </div>
                                </div>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                                        Innovación 88%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="text-center">
                        <h2 class="mb-4">¿Listo para empezar?</h2>
                        <p class="text-muted mb-4">
                            Únete a las empresas que ya están optimizando sus procesos con TIMEOUT
                        </p>
                        <a href="#" class="btn btn-primary btn-lg px-5">Comenzar Ahora</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once(__DIR__ . '/../../view/components/footer.php'); ?>
    </div>
</section>

<style>
    .separator {
        width: 60px;
        height: 3px;
        background-color: var(--bs-primary);
    }

    .feature-icon {
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .progress {
        background-color: rgba(0,0,0,0.1);
    }

    .progress-bar {
        background-color: var(--bs-danger);
        font-weight: 500;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>