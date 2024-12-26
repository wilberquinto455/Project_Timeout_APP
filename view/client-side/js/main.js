$(document).ready(function() {
    // Ocultar el preloader cuando la página esté cargada
    $('.preloader').fadeOut('slow');

    // Inicializar tooltips de Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Manejar el menú móvil
    $('.mobile-menu-toggle').on('click', function() {
        $('.sidebar').toggleClass('active');
    });

    // Cerrar menú móvil al hacer clic fuera
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.sidebar, .mobile-menu-toggle').length) {
            $('.sidebar').removeClass('active');
        }
    });

    // Activar el elemento de menú actual
    var currentPath = window.location.pathname;
    $('.nav-link').each(function() {
        var linkPath = $(this).attr('href');
        if (currentPath.indexOf(linkPath) !== -1) {
            $(this).addClass('active');
        }
    });
});
