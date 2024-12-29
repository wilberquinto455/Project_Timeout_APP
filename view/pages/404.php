<?php
$pageTitle = 'Página no encontrada';
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php');
require_once(__DIR__ . '/../../view/components/header.php');
?>

<section class="d-flex">
    <!-- Sidebar -->
    <?php require_once(__DIR__ . '/../components/sidebar.php'); ?>

    <div class="main-content">
        <!-- Mobile Nav -->
        <?php require_once(__DIR__ . '/../components/mobile-nav.php'); ?>

        <!-- 404 Content -->
        <div class="container py-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="error-page">
                        <h1 class="display-1 fw-bold text-primary">404</h1>
                        <h2 class="display-4 mb-4">Página no encontrada</h2>
                        <p class="lead text-muted mb-5">
                            Lo sentimos, la página que estás buscando no existe o ha sido movida.
                        </p>
                        <a href="<?php echo get_url(); ?>" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-home me-2"></i>Volver al inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .error-page {
        padding: 60px 0;
    }

    .error-page h1 {
        font-size: 120px;
        margin-bottom: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    .error-page .btn {
        transition: transform 0.3s ease;
    }

    .error-page .btn:hover {
        transform: translateY(-2px);
    }
</style>
