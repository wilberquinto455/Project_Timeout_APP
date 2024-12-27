<?php

if (!function_exists('is_production')) {
    function is_production() {
        return isset($_SERVER['HEROKU']) || 
               (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
    }
}

if (!function_exists('get_base_url')) {
    function get_base_url() {
        if (is_production()) {
            $protocol = 'https://';
            return $protocol . $_SERVER['HTTP_HOST'];
        } else {
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $host = $_SERVER['HTTP_HOST'];
            return $protocol . $host . '/Timeout';
        }
    }
}

if (!function_exists('asset_url')) {
    function asset_url($path) {
        return get_base_url() . '/' . ltrim($path, '/');
    }
}
