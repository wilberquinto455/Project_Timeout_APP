<?php
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php');
?>
<!-- Mobile Navigation -->
<header class="mobile-nav pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <a href="<?php echo get_url(); ?>" class="text-decoration-none">
                    <img src="<?php echo image('FAVICON_TIMEOUT.png'); ?>" alt="Timeout Logo" height="40">
                    <span class="text-white ms-2 h4">TIMEOUT</span>
                </a>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">TIMEOUT</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo get_url(); ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo get_url('about'); ?>">¿Quiénes Somos?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo get_url('privacy'); ?>">Términos Y Condiciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo get_url('contact'); ?>">Contacto</a>
            </li>
            
            <?php if (!get_timeout_user()->isGuest()): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo get_url('dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo get_url('documents'); ?>">Documentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo get_url('profile'); ?>">Mi Perfil</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="btn btn-danger w-100" href="<?php echo get_url('auth/logout'); ?>">
                        Cerrar Sesión <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item mt-3">
                    <a class="btn btn-danger w-100" href="<?php echo get_url('login'); ?>">
                        Iniciar Sesión <i class="fas fa-sign-in-alt"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<style>
    .mobile-nav {
        display: none;
        background: var(--timeout-dark);
        padding: 1rem 0;
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .offcanvas {
        --bs-offcanvas-width: 280px;
    }

    @media (max-width: 991px) {
        .mobile-nav {
            display: block;
        }
    }
</style>
