<?php
$pageTitle = 'Registro';
$additionalStyles = '
<style>
    .register-container {
        max-width: 500px;
        margin: 2rem auto;
    }
    .register-form {
        background: rgba(255,255,255,0.05);
        padding: 2rem;
        border-radius: 10px;
    }
    .register-form h1 {
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

        <!-- Contenido específico de Register -->
        <div class="container">
            <div class="register-container">
                <div class="register-form">
                    <h1>Crear Cuenta</h1>
                    <form action="<?php echo get_url('auth/register'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                Acepto los <a href="<?php echo get_url('privacy'); ?>">términos y condiciones</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Registrarse</button>
                    </form>
                    <hr class="my-4">
                    <div class="text-center">
                        <p>¿Ya tienes una cuenta?</p>
                        <a href="<?php echo get_url('login'); ?>" class="btn btn-outline-danger">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once(BASE_PATH . '/view/components/footer.php'); ?>
    </div>
</section>
