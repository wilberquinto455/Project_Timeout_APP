<?php
require_once(__DIR__ . '/../../config/url_helper.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Timeout</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo asset_url('view/client-side/images/FAVICON_TIMEOUT.png'); ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo asset_url('view/client-side/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset_url('view/client-side/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset_url('view/client-side/css/boxicons.min.css'); ?>">
    
    <!-- JavaScript -->
    <script src="<?php echo asset_url('view/client-side/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo asset_url('view/client-side/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo asset_url('view/client-side/js/main.js'); ?>"></script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader d-flex justify-content-center align-items-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    <!-- Custom Scripts -->
    <script>
        // Mejorado manejo del preloader
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader');
            if (preloader) {
                preloader.classList.add('hidden');
                // Remover completamente después de la transición
                setTimeout(() => {
                    preloader.remove();
                }, 500);
            }
        });
    </script>
</body>
