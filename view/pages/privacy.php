<?php
$pageTitle = 'Términos y Condiciones';
$additionalStyles = '
<style>
    .privacy-section {
        background: rgba(255,255,255,0.05);
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    .privacy-section h2 {
        color: var(--timeout-red);
        margin-bottom: 1.5rem;
    }
    .privacy-section ul {
        list-style-type: none;
        padding-left: 0;
    }
    .privacy-section ul li {
        margin-bottom: 1rem;
        padding-left: 1.5rem;
        position: relative;
    }
    .privacy-section ul li:before {
        content: "•";
        color: var(--timeout-red);
        position: absolute;
        left: 0;
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

        <!-- Contenido específico de Privacy -->
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mb-4">Términos y Condiciones</h1>
                    
                    <div class="privacy-section">
                        <h2>1. Aceptación de los Términos</h2>
                        <p>
                            Al acceder y utilizar este sistema de gestión documental, usted acepta estos términos y condiciones 
                            en su totalidad. Si no está de acuerdo con estos términos, no debe utilizar este sistema.
                        </p>
                    </div>

                    <div class="privacy-section">
                        <h2>2. Uso del Sistema</h2>
                        <ul>
                            <li>El sistema debe utilizarse únicamente para fines laborales autorizados.</li>
                            <li>Los usuarios son responsables de mantener la confidencialidad de sus credenciales.</li>
                            <li>Está prohibido compartir credenciales de acceso con terceros.</li>
                            <li>Los usuarios deben cerrar sesión al finalizar su uso del sistema.</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>3. Privacidad y Datos</h2>
                        <ul>
                            <li>Toda la información ingresada en el sistema se maneja con estricta confidencialidad.</li>
                            <li>Los datos personales se procesan de acuerdo con nuestra política de privacidad.</li>
                            <li>Los usuarios tienen derecho a solicitar información sobre sus datos almacenados.</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>4. Responsabilidades</h2>
                        <ul>
                            <li>Los usuarios son responsables de la precisión de la información que ingresan.</li>
                            <li>La empresa no se hace responsable por el mal uso del sistema.</li>
                            <li>Los usuarios deben reportar cualquier anomalía o fallo del sistema.</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>5. Modificaciones</h2>
                        <p>
                            Nos reservamos el derecho de modificar estos términos en cualquier momento. 
                            Los cambios entrarán en vigor inmediatamente después de su publicación en el sistema.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once(BASE_PATH . '/view/components/footer.php'); ?>
    </div>
</section>
