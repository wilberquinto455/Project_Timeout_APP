<?php
$pageTitle = 'Iniciar Sesión';
$additionalStyles = '
<style>
    .login-container {
        max-width: 400px;
        margin: 2rem auto;
    }
    .login-form {
        background: rgba(255,255,255,0.05);
        padding: 2rem;
        border-radius: 10px;
    }
    .login-form h1 {
        text-align: center;
        margin-bottom: 2rem;
    }
    .form-control {
        background-color: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.1);
        color: white;
    }
    .form-control:focus {
        background-color: rgba(255,255,255,0.15);
        border-color: var(--timeout-red);
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(228, 17, 47, 0.25);
    }
    .form-control::placeholder {
        color: rgba(255,255,255,0.5);
    }
</style>';

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../config/assets.php');

// Incluir el header
require_once(BASE_PATH . '/view/components/header.php');
?>

<section class="d-flex">
    <!-- Sidebar -->
    <?php require_once(BASE_PATH . '/view/components/sidebar.php'); ?>

    <div class="main-content">
        <!-- Mobile Nav -->
        <?php require_once(BASE_PATH . '/view/components/mobile-nav.php'); ?>

        <!-- Contenido específico de Login -->
        <div class="container">
            <div class="login-container">
                <div class="login-form">
                    <h1>Iniciar Sesión</h1>
                    <form action="<?php echo get_url('auth/login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Iniciar Sesión</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="<?php echo get_url('recover-password'); ?>">¿Olvidaste tu contraseña?</a>
                    </div>
                    <hr class="my-4">
                    <div class="text-center">
                        <p>¿No tienes una cuenta?</p>
                        <a href="<?php echo get_url('register'); ?>" class="btn btn-outline-danger">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once(BASE_PATH . '/view/components/footer.php'); ?>
    </div>
</section>
