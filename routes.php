<?php

class Router {
    private static $instance = null;
    private $routes = [];

    private function __construct() {
        error_log("Router initialized");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function add($path, $handler) {
        error_log("Adding route: " . $path);
        $this->routes[$path] = $handler;
    }

    public function match($url) {
        error_log("Matching URL: " . $url);
        error_log("Available routes: " . implode(", ", array_keys($this->routes)));

        // Si la URL está vacía, es la página principal
        if (empty($url)) {
            error_log("Empty URL, returning null for home page");
            return null;
        }

        // Buscar la ruta exacta
        if (isset($this->routes[$url])) {
            error_log("Route found for: " . $url);
            return $this->routes[$url];
        }

        error_log("No route found for: " . $url);
        return false;
    }
}

// Inicializar el router
$router = Router::getInstance();

// Definir las rutas
$router->add('about', function() {
    error_log("Executing about route");
    $pageTitle = 'Acerca de';
    require_once(__DIR__ . '/view/client-side/about.php');
});

$router->add('contact', function() {
    error_log("Executing contact route");
    $pageTitle = 'Contacto';
    require_once(__DIR__ . '/view/client-side/contact.php');
});

$router->add('login', function() {
    error_log("Executing login route");
    $pageTitle = 'Iniciar Sesión';
    require_once(__DIR__ . '/view/client-side/login.php');
});

$router->add('register', function() {
    error_log("Executing register route");
    $pageTitle = 'Registro';
    require_once(__DIR__ . '/view/client-side/register.php');
});

$router->add('recover-password', function() {
    error_log("Executing recover-password route");
    $pageTitle = 'Recuperar Contraseña';
    require_once(__DIR__ . '/view/client-side/recover-password.php');
});

$router->add('privacy', function() {
    error_log("Executing privacy route");
    $pageTitle = 'Política de Privacidad';
    require_once(__DIR__ . '/view/client-side/privacy.php');
});

$router->add('dashboard', function() {
    error_log("Executing dashboard route");
    $pageTitle = 'Panel de Control';
    require_once(__DIR__ . '/view/client-side/dashboard.php');
});

$router->add('profile', function() {
    error_log("Executing profile route");
    $pageTitle = 'Perfil';
    require_once(__DIR__ . '/view/client-side/profile.php');
});

$router->add('documents', function() {
    error_log("Executing documents route");
    $pageTitle = 'Documentos';
    require_once(__DIR__ . '/view/client-side/documents.php');
});

$router->add('documents/create', function() {
    error_log("Executing documents/create route");
    $pageTitle = 'Crear Documento';
    require_once(__DIR__ . '/view/client-side/documents/create.php');
});

$router->add('auth/login', function() {
    error_log("Executing auth/login route");
    $pageTitle = 'Iniciar Sesión';
    require_once(__DIR__ . '/controllers/auth/login.php');
});

$router->add('auth/register', function() {
    error_log("Executing auth/register route");
    $pageTitle = 'Registro';
    require_once(__DIR__ . '/controllers/auth/register.php');
});

$router->add('auth/recover', function() {
    error_log("Executing auth/recover route");
    $pageTitle = 'Recuperar Contraseña';
    require_once(__DIR__ . '/controllers/auth/recover.php');
});

$router->add('auth/logout', function() {
    error_log("Executing auth/logout route");
    session_destroy();
    header('Location: ' . get_url('login'));
    exit();
});

$router->add('settings', function() {
    error_log("Executing settings route");
    $pageTitle = 'Configuración';
    require_once(__DIR__ . '/view/pages/settings.php');
});

$router->add('api/documents', function() {
    error_log("Executing api/documents route");
    require_once(__DIR__ . '/controllers/api/documents.php');
});

$router->add('api/users', function() {
    error_log("Executing api/users route");
    require_once(__DIR__ . '/controllers/api/users.php');
});

$router->add('api/notifications', function() {
    error_log("Executing api/notifications route");
    require_once(__DIR__ . '/controllers/api/notifications.php');
});

$router->add('documents/edit', function() {
    error_log("Executing documents/edit route");
    $pageTitle = 'Editar Documento';
    require_once(__DIR__ . '/view/client-side/documents/edit.php');
});

$router->add('documents/view', function() {
    error_log("Executing documents/view route");
    $pageTitle = 'Ver Documento';
    require_once(__DIR__ . '/view/client-side/documents/view.php');
});
