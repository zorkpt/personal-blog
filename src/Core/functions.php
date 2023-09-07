<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function base_path($path): string
{
    return BASE_DIR . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function make_slug($string) {
    $string = trim($string);
    $slug = strtolower(str_replace(' ', '-', $string));
    return preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
}

function is_logged(): bool {
    return isset($_SESSION['user_name']);
}
