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