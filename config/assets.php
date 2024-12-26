<?php

// Función para obtener la URL de una imagen
function image($filename) {
    return get_url('view/client-side/images/' . $filename);
}

// Función para obtener la URL de un archivo CSS
function css($filename) {
    return get_url('view/client-side/css/' . $filename);
}

// Función para obtener la URL de un archivo JavaScript
function js($filename) {
    return get_url('view/client-side/js/' . $filename);
}

// Función para obtener la URL de un archivo de audio
function audio($filename) {
    return get_url('view/client-side/audio/' . $filename);
}

// Función para obtener la URL de cualquier archivo en la carpeta client-side
function asset($path) {
    return get_url('view/client-side/' . $path);
}

// Función para incluir archivos CSS
function include_css($files) {
    if (!is_array($files)) {
        $files = [$files];
    }
    
    foreach ($files as $file) {
        echo '<link rel="stylesheet" href="' . css($file) . '">';
    }
}

// Función para incluir archivos JavaScript
function include_js($files) {
    if (!is_array($files)) {
        $files = [$files];
    }
    
    foreach ($files as $file) {
        echo '<script src="' . js($file) . '"></script>';
    }
}

// Función para incluir plugins
function include_plugins($files) {
    if (!is_array($files)) {
        $files = [$files];
    }
    
    foreach ($files as $file) {
        if (strpos($file, '.css') !== false) {
            echo '<link rel="stylesheet" href="' . asset($file) . '">';
        } else if (strpos($file, '.js') !== false) {
            echo '<script src="' . asset($file) . '"></script>';
        }
    }
}
