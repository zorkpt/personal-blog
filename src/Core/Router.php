<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function add($method, $controller, $uri) {
        $this->routes[] = [
            'method' => $method,
            'controller' => $controller,
            'uri' => $uri
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add('GET', $controller, $uri);
    }

    public function route($uri, $method) {
        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path('Http/Controllers/' . $route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

}