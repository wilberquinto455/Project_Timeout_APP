<?php
$pageTitle = 'Página no encontrada';
require_once 'views/layouts/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-1">404</h1>
            <h2 class="mb-4">Página no encontrada</h2>
            <p class="lead mb-5">Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
            <a href="<?php echo BASE_URL; ?>/" class="btn btn-primary">Volver al inicio</a>
        </div>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'; ?>
