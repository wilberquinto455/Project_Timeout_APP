<?php

function is_production() {
    return isset($_SERVER['HEROKU']) || 
           (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
}

function get_base_url() {
    if (is_production()) {
        return 'https://' . $_SERVER['HTTP_HOST'];
    } else {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/Timeout';
    }
}

function asset_url($path) {
    return get_base_url() . '/' . ltrim($path, '/');
}
