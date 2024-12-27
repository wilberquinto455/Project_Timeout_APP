<?php
$pageTitle = 'Página no encontrada';
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

        <!-- 404 Content -->
        <div class="container py-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="error-page">
                        <h1 class="display-1 fw-bold text-primary">404</h1>
                        <h2 class="mb-4">¡Oops! Página no encontrada</h2>
                        <p class="lead text-muted mb-5">
                            Lo sentimos, la página que estás buscando no existe o ha sido movida.
                        </p>
                        <a href="<?php echo get_url(''); ?>" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-home me-2"></i>Volver al Inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .error-page {
        padding: 40px;
    }

    .error-page h1 {
        font-size: 120px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    .error-page h2 {
        font-size: 36px;
    }

    .btn-primary {
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
