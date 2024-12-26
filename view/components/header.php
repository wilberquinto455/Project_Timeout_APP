<?php
// Remove BASE_PATH definition if it exists
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - TIMEOUT' : 'TIMEOUT'; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_url('view/client-side/images/FAVICON_TIMEOUT.png'); ?>" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo get_url('view/client-side/css/style.css'); ?>">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Preloader CSS -->
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
</head>
<body>
    <!-- Preloader -->
    <div class="preloader d-flex justify-content-center align-items-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    <!-- Custom Scripts -->
    <script src="<?php echo get_url('view/client-side/js/main.js'); ?>"></script>
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
