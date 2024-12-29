<?php
$pageTitle = 'Acerca de';
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php');
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
                                        Organiza y controla tus documentos de manera eficiente
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

                    <!-- Sección de Misión y Visión -->
                    <div class="row align-items-center mb-5">
                        <div class="col-md-6">
                            <h2 class="mb-4">Nuestra Misión</h2>
                            <p class="text-muted">
                                En TIMEOUT, nos dedicamos a proporcionar soluciones innovadoras para la gestión del tiempo y documentos, 
                                permitiendo a las empresas optimizar sus procesos y aumentar su productividad.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h2 class="mb-4">Nuestra Visión</h2>
                            <p class="text-muted">
                                Ser la plataforma líder en gestión de tiempos y documentos, reconocida por su innovación, 
                                eficiencia y compromiso con el éxito de nuestros clientes.
                            </p>
                        </div>
                    </div>

                    <!-- Valores Corporativos -->
                    <div class="text-center mb-5">
                        <h2 class="mb-4">Nuestros Valores</h2>
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="value-item">
                                    <i class="fas fa-heart fa-2x text-primary mb-3"></i>
                                    <h4>Compromiso</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="value-item">
                                    <i class="fas fa-lightbulb fa-2x text-primary mb-3"></i>
                                    <h4>Innovación</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="value-item">
                                    <i class="fas fa-shield-alt fa-2x text-primary mb-3"></i>
                                    <h4>Seguridad</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="value-item">
                                    <i class="fas fa-handshake fa-2x text-primary mb-3"></i>
                                    <h4>Confianza</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .separator {
        width: 60px;
        height: 4px;
        background-color: var(--primary);
        border-radius: 2px;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: rgba(var(--primary-rgb), 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .value-item {
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(var(--primary-rgb), 0.05);
        transition: transform 0.3s ease;
    }

    .value-item:hover {
        transform: translateY(-5px);
    }
</style>