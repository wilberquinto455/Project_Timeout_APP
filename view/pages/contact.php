<?php
$pageTitle = 'Contacto';
$additionalStyles = '
<style>
    .contact-container {
        max-width: 800px;
        margin: 2rem auto;
    }
    .contact-form {
        background: rgba(255,255,255,0.05);
        padding: 2rem;
        border-radius: 10px;
    }
    .contact-info {
        background: rgba(255,255,255,0.05);
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    .contact-info i {
        color: var(--timeout-red);
        margin-right: 0.5rem;
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

        <!-- Contenido específico de Contact -->
        <div class="container">
            <div class="contact-container">
                <h1 class="text-center mb-4">Contáctanos</h1>
                
                <div class="contact-info">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                            <h4>Ubicación</h4>
                            <p>Ac 116 #7-15, Bogotá</p>
                        </div>
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <i class="fas fa-phone fa-2x mb-2"></i>
                            <h4>Teléfono</h4>
                            <p>+57 (1) 123-4567</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-envelope fa-2x mb-2"></i>
                            <h4>Email</h4>
                            <p>info@timeout.com</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h2 class="text-center mb-4">Envíanos un Mensaje</h2>
                    <form action="<?php echo get_url('contact/submit'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once(BASE_PATH . '/view/components/footer.php'); ?>
    </div>
</section>
