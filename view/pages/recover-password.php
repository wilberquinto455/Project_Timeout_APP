<?php
$pageTitle = 'Recuperar Contraseña';
$additionalStyles = '
<style>
    .recover-container {
        max-width: 400px;
        margin: 2rem auto;
    }
    .recover-form {
        background: rgba(255,255,255,0.05);
        padding: 2rem;
        border-radius: 10px;
    }
    .recover-form h1 {
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

        <!-- Contenido específico de Recover Password -->
        <div class="container">
            <div class="recover-container">
                <div class="recover-form">
                    <h1>Recuperar Contraseña</h1>
                    <p class="text-center mb-4">
                        Ingresa tu correo electrónico y te enviaremos instrucciones para recuperar tu contraseña.
                    </p>
                    <form action="<?php echo get_url('auth/recover'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Enviar Instrucciones</button>
                    </form>
                    <hr class="my-4">
                    <div class="text-center">
                        <p>¿Recordaste tu contraseña?</p>
                        <a href="<?php echo get_url('login'); ?>" class="btn btn-outline-danger">Volver al Login</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once(BASE_PATH . '/view/components/footer.php'); ?>
    </div>
</section>
