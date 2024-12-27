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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset_url('view/client-side/css/style.css'); ?>">
    
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader d-flex justify-content-center align-items-center">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    <!-- Custom Scripts -->
    <script src="<?php echo asset_url('view/client-side/js/main.js'); ?>"></script>
    <script>
        // Mejorado manejo del preloader
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader');
            if (preloader) {
                preloader.classList.add('hidden');
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }
        });
    </script>

    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 25, 30, 0.95);
            z-index: 9999;
            opacity: 1;
            visibility: visible;
            transition: all 0.5s ease-in-out;
        }

        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
            border-width: 0.25em;
        }
    </style>
</body>
</html>
