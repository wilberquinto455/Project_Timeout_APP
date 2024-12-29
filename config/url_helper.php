<?php

if (!function_exists('is_production')) {
    function is_production() {
        return isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] !== 'localhost';
    }
}

if (!function_exists('get_base_url')) {
    function get_base_url() {
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || 
                   (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') 
                   ? 'https://' : 'http://';
        
        $host = $_SERVER['HTTP_HOST'];
        
        if (is_production()) {
            return $protocol . $host;
        } else {
            return $protocol . $host . '/Timeout';
        }
    }
}

if (!function_exists('asset_url')) {
    function asset_url($path = '') {
        return get_base_url() . '/' . ltrim($path, '/');
    }
}

if (!function_exists('current_url')) {
    function current_url() {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
               "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
}
