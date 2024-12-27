document.addEventListener('DOMContentLoaded', function() {
    // Ocultar el preloader cuando la página esté cargada
    const preloader = document.querySelector('.preloader');
    if (preloader) {
        preloader.classList.add('hidden');
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    }

    // Inicializar tooltips de Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Manejar el menú móvil
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    if (mobileMenuToggle && sidebar) {
        mobileMenuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        // Cerrar menú móvil al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.sidebar') && !e.target.closest('.mobile-menu-toggle')) {
                sidebar.classList.remove('active');
            }
        });
    }

    // Activar el elemento de menú actual
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(function(link) {
        const linkPath = link.getAttribute('href');
        if (linkPath && currentPath.indexOf(linkPath) !== -1) {
            link.classList.add('active');
        }
    });
});
