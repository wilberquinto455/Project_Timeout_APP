<?php

// Definir las rutas disponibles
$routes = [
    '' => [
        'view' => 'view/client-side/home.php',
        'layout' => true
    ],
    'about' => [
        'view' => 'view/client-side/about.php',
        'layout' => true
    ],
    'contact' => [
        'view' => 'view/client-side/contact.php',
        'layout' => true
    ],
    'login' => [
        'view' => 'view/client-side/login.php',
        'layout' => true
    ],
    'register' => [
        'view' => 'view/client-side/register.php',
        'layout' => true
    ],
    'recover-password' => [
        'view' => 'view/client-side/recover-password.php',
        'layout' => true
    ],
    'privacy' => [
        'view' => 'view/client-side/privacy.php',
        'layout' => true
    ],
    'dashboard' => [
        'view' => 'view/dashboard/index.php',
        'layout' => true
    ],
    'profile' => [
        'view' => 'view/client-side/profile.php',
        'layout' => true
    ],
    'documents' => [
        'view' => 'view/client-side/documents/index.php',
        'layout' => true
    ],
    'documents/create' => [
        'view' => 'view/client-side/documents/create.php',
        'layout' => true
    ],
    'documents/edit' => [
        'view' => 'view/client-side/documents/edit.php',
        'layout' => true
    ],
    'documents/view' => [
        'view' => 'view/client-side/documents/view.php',
        'layout' => true
    ],
    'auth/login' => [
        'view' => 'view/client-side/auth/login.php',
        'layout' => true
    ],
    'auth/register' => [
        'view' => 'view/client-side/auth/register.php',
        'layout' => true
    ],
    'auth/recover' => [
        'view' => 'view/client-side/auth/recover.php',
        'layout' => true
    ],
    'auth/logout' => [
        'view' => 'view/client-side/auth/logout.php',
        'layout' => false
    ],
    'settings' => [
        'view' => 'view/client-side/settings.php',
        'layout' => true
    ],
    'api/documents' => [
        'view' => 'api/documents.php',
        'layout' => false
    ],
    'api/users' => [
        'view' => 'api/users.php',
        'layout' => false
    ],
    'api/notifications' => [
        'view' => 'api/notifications.php',
        'layout' => false
    ]
];
