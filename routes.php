<?php

class Router {
    private static $instance = null;
    private $routes = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function add($path, $handler) {
        $this->routes[$path] = $handler;
    }

    public function match($url) {
        // Si la URL está vacía, es la página principal
        if (empty($url)) {
            return null;
        }

        // Buscar la ruta exacta
        if (isset($this->routes[$url])) {
            return $this->routes[$url];
        }

        return false;
    }
}

// Inicializar el router
$router = Router::getInstance();

// Definir las rutas
$router->add('about', function() {
    require_once(__DIR__ . '/view/client-side/about.php');
});

$router->add('contact', 'contact');
$router->add('login', 'login');
$router->add('register', 'register');
$router->add('recover-password', 'recover-password');
$router->add('privacy', 'privacy');
$router->add('dashboard', 'dashboard');
$router->add('profile', 'profile');
$router->add('documents', 'documents');
$router->add('documents/create', 'documents/create');
$router->add('documents/edit', 'documents/edit');
$router->add('documents/view', 'documents/view');

// Rutas para la autenticación
$router->add('auth/login', 'controllers/auth/login.php');
$router->add('auth/register', 'controllers/auth/register.php');
$router->add('auth/recover', 'controllers/auth/recover.php');
$router->add('auth/logout', function() {
    session_destroy();
    header('Location: ' . get_url('login'));
    exit();
});

// Rutas para el panel de control
$router->add('settings', 'view/pages/settings.php');

// Rutas para las API
$router->add('api/documents', 'controllers/api/documents.php');
$router->add('api/users', 'controllers/api/users.php');
$router->add('api/notifications', 'controllers/api/notifications.php');
