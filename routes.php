<?php

class Router {
    private static $instance = null;
    private $routes = [];

    private function __construct() {
        // Constructor privado para Singleton
    }

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
        // Remover query strings
        $url = parse_url($url, PHP_URL_PATH);
        $url = trim($url, '/');
        
        // Si la URL está vacía, es la página principal
        if (empty($url)) {
            return null;
        }

        // Buscar la ruta exacta
        if (isset($this->routes[$url])) {
            return $this->routes[$url];
        }

        // Buscar rutas con parámetros
        foreach ($this->routes as $route => $handler) {
            $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '([^/]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches); // Remover la coincidencia completa
                return ['handler' => $handler, 'params' => $matches];
            }
        }

        return false;
    }

    public function execute($route) {
        if (is_array($route)) {
            // Ruta con parámetros
            $handler = $route['handler'];
            $params = $route['params'];
            
            if (is_callable($handler)) {
                call_user_func_array($handler, $params);
            } else {
                $this->loadView($handler, $params);
            }
        } else {
            // Ruta simple
            if (is_callable($route)) {
                call_user_func($route);
            } else {
                $this->loadView($route);
            }
        }
    }

    private function loadView($view, $params = []) {
        $viewPath = BASE_PATH . '/view/pages/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            // Extraer parámetros para que estén disponibles en la vista
            if (!empty($params)) {
                extract($params);
            }
            
            // Cargar el header
            require_once(BASE_PATH . '/view/components/header.php');
            
            // Estructura básica de la página
            echo '<section class="d-flex">';
            
            // Sidebar
            require_once(BASE_PATH . '/view/components/sidebar.php');
            
            echo '<div class="main-content">';
            
            // Mobile Nav
            require_once(BASE_PATH . '/view/components/mobile-nav.php');
            
            // Contenido de la página
            require_once($viewPath);
            
            // Footer
            require_once(BASE_PATH . '/view/components/footer.php');
            
            echo '</div></section>';
        } else {
            // Si la vista no existe, mostrar página 404
            require_once(BASE_PATH . '/view/pages/404.php');
        }
    }
}

// Inicializar el router
$router = Router::getInstance();

// Definir las rutas para todas las páginas
$router->add('about', 'about');
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
