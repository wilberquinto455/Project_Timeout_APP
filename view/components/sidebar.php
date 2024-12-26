<?php
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php');
?>
<aside>
    <div class="sidenav position-sticky d-flex flex-column justify-content-between">
        <a class="navbar-brand text-center" href="<?php echo get_url(); ?>">
            <img src="<?php echo image('FAVICON_TIMEOUT.png'); ?>" alt="Timeout Logo">
            <br>
            <span class="h4">TIMEOUT</span>
        </a>
        
        <div class="navbar navbar-dark my-4 p-0">
            <ul class="navbar-nav w-100">
                <li class="nav-item active">
                    <a class="nav-link text-white px-0 pt-0" href="<?php echo get_url(); ?>">Inicio</a>
                </li>
                <li class="nav-item accordion">
                    <a class="nav-link text-white" href="#!" data-bs-toggle="collapse" data-bs-target="#drop-menu">
                        Acerca De
                    </a>
                    <div id="drop-menu" class="drop-menu collapse">
                        <a class="d-block" href="<?php echo get_url('about'); ?>">¿Quiénes Somos?</a>
                        <a class="d-block" href="<?php echo get_url('privacy'); ?>">Términos Y Condiciones</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-0" href="<?php echo get_url('contact'); ?>">Contacto</a>
                </li>
                <?php if (!get_timeout_user()->isGuest()): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white px-0" href="<?php echo get_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-0" href="<?php echo get_url('documents'); ?>">Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-0" href="<?php echo get_url('profile'); ?>">Mi Perfil</a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="btn btn-danger text-white" href="<?php echo get_url('auth/logout'); ?>">
                            Cerrar Sesión <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item mt-3">
                        <a class="btn btn-danger text-white" href="<?php echo get_url('login'); ?>">
                            Iniciar Sesión <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</aside>

<style>
    .sidenav {
        width: 250px;
        height: 100vh;
        background: var(--timeout-dark);
        padding: 2rem;
        border-right: 1px solid rgba(255,255,255,0.1);
    }

    .sidenav .navbar-brand img {
        width: 150px;
        height: auto;
    }

    .drop-menu {
        padding-left: 1rem;
    }

    .drop-menu a {
        color: #b0b0b0;
        text-decoration: none;
        padding: 0.5rem 0;
        transition: color 0.3s;
    }

    .drop-menu a:hover {
        color: white;
    }

    @media (max-width: 991px) {
        .sidenav {
            display: none;
        }
    }
</style>
