<?php
$pageTitle = 'Login';
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
        <div class="container login-container py-5">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 rounded-lg mt-5">
                    <div class="card-body p-5">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <svg class="text-danger" style="width: 64px; height: 64px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2"/>
                            </svg>
                            <h4 class="text-dark font-weight-bold mt-3">INICIO DE SESIÓN</h4>
                        </div>

                        <!-- Login Form -->
                        <form action="<?php echo get_url('controller/LoginUser.php'); ?>" method="POST" id="login-1">
                            <div class="form-group">
                                <label class="small font-weight-bold">Usuario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user text-danger"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="Correo" placeholder="Ingresa tu usuario" required minlength="4" maxlength="90">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small font-weight-bold">Contraseña</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock text-danger"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="Password" placeholder="Ingresa tu contraseña" required minlength="4" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="showPassword">
                                    <label class="custom-control-label small" for="showPassword">
                                        Mostrar contraseña
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block py-2 mt-4">
                                Iniciar Sesión
                            </button>

                            <div class="text-center mt-3">
                                <a href="recuperarContraseña.php" class="small text-danger">¿Olvidaste tu Contraseña?</a>
                            </div>
                        </form>
                    </div>
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

    .login-container {
            min-height: calc(100vh - 76px);
        }
        .card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .input-group-text {
            background-color: transparent;
            border-right: none;
        }
        .form-control {
            border-left: none;
        }
        .input-group:hover .input-group-text,
        .input-group:hover .form-control {
            border-color: #dc3545;
        }
        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .navbar-brand svg {
            width: 30px;
            height: 30px;
        }
</style>

     <script src="<?php echo js('script.js'); ?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <!-- conexion con el js de sweetalert2 -->
    <script src="<?php echo get_url('view/dashboard/dist/js/sweetalert2.all.min.js'); ?>"></script>
    <script>
        // Toggle password visibility
        document.getElementById('showPassword').addEventListener('change', function() {
            const password = document.getElementById('password');
            password.type = this.checked ? 'text' : 'password';
        });
    </script>
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
        })
        </script>
        <?php
        unset($_SESSION['titulo']);
        unset($_SESSION['msj']);
        unset($_SESSION['icono']);
    }
    ?>
    <?php
        // si no exite la autenticacion o el rol, mostrara una alerta de seguridad
        if (isset($_SESSION['seguridad'])) {
            $alerta = $_SESSION['seguridad'];
            echo $alerta;
            unset($_SESSION['seguridad']);
        }
    ?>
</body>
</html>