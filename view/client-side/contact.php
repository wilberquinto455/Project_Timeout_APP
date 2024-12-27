<?php
$pageTitle = 'Contacto';
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

        <!-- About Content -->
        <div class="container py-5">
        <div class="row" style="justify-content: center">
                    <div class="col-md-10 my-5">
                        <div class="contact-form" style="background-color: #1A191E;">
                            <h1 class="text-white add-letter-space mb-5">Exprésanos Tus Inquietudes!</h1>
                            <form action="../../controller/CreatePQR.php" method="POST" class="formulario-contacto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="firstName" class="text-black-300">Nombres</label>
                                            <input type="text" name="Nombres_pqr" id="firstName"
                                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                                placeholder="Robert Lee" required>
                                            <p class="invalid-feedback">¡Por favor ingrese su nombre!</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="lastName" class="text-black-300">Apellidos</label>
                                            <input type="text" name="Apellidos_pqr" id="lastName"
                                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                                placeholder="Anderson" required>
                                            <p class="invalid-feedback">¡Por favor ingrese su apellido!</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="email" class="text-black-300">E-Mail</label>
                                            <input type="email" name="Email_pqr" id="email"
                                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                                placeholder="Example@gmail.com" required>
                                            <p class="invalid-feedback">¡Por favor ingrese su correo!</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label class="text-black-300">Motivo De Tu PQR?</label>
                                            <select class="d-block w-100" name="Motivo_pqr">
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="Propuestas">Propuestas</option>
                                                <option value="Preguntas">Preguntas</option>
                                                <option value="Quejas">Quejas</option>
                                                <option value="Reclamos">Reclamos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-5">
                                            <label for="message"  class="text-black-300">Escribe Tu Mensaje Aqui:</label>
                                            <textarea name="Mensaje_pqr" maxlength="300" id="mensaje"
                                                class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                                                placeholder="Hola COMUNICATE SG! Mi opinión es..."
                                                required></textarea>
                                            <p id="contador" style="display: flex; justify-content: end;">0/300</p>
                                            <p class="invalid-feedback">¡Por favor ingrese su feedback!</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">Enviar <img
                                                src="images/arrow-right.png" alt=""></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
          </div>

        <!-- Footer -->
        <?php require_once(__DIR__ . '/../../view/components/footer.php'); ?>
    </div>
</section>

<style>
    .separator {
        width: 60px;
        height: 3px;
        background-color: var(--bs-primary);
    }

    .feature-icon {
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>

    <!-- END main-wrapper -->
    <script>
        var mensaje = document.getElementById('mensaje');
        var contador = document.getElementById('contador');

        mensaje.addEventListener('input', function(a) {
        var target = a.target;
        var longitudMax = target.getAttribute('maxlength');
        var longitudAct = target.value.length;
        contador.innerHTML = `${longitudAct}/${longitudMax}`;
});
    </script>
   

    <!-- Main Script -->
    <script src="<?php echo js('script.js'); ?>"></script>
    <!-- conexion con el js de sweetalert2 -->
    <script src="<?php echo get_url('view/dashboard/dist/js/sweetalert2.all.min.js'); ?>"></script>
    <!-- Alerta -->
    <?php 
        if (isset($_SESSION['titulo'])) {
            $titulo = $_SESSION['titulo'];
            $msj = $_SESSION['msj'];
            $icono = $_SESSION['icono'];
            ?>
            <script>
            Swal.fire({
                title: '<?php echo $titulo?>',
                text: '<?php echo $msj?>',
                icon: '<?php echo $icono?>',
                confirmButtonColor: '#e4112f'
                // tiempo que aparece la alerta '1000' es lo mismo que 1 segundo
                // timer: 10000
            })
            </script>
        <?php
            unset($_SESSION['titulo']);
            unset($_SESSION['msj']);
            unset($_SESSION['icono']);
        }
    ?>
    <!-- Alerta -->
    <?php
        // si no exite la autenticacion o el rol, mostrara una alerta de seguridad
        if (isset($_SESSION['seguridad'])) {
            $alerta = $_SESSION['seguridad'];
            echo $alerta;
            unset($_SESSION['seguridad']);
        }
    ?>