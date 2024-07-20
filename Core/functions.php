<?php

use Core\Response;

function is_URI($value) {
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort($code = 404) {
    http_response_code($code);
    require base_path("Views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('Views/' . $path);
}

function redirect($path) {
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}
