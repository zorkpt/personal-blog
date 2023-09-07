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

    public function post($uri, $controller) {
        return $this->add('POST', $controller, $uri);
    }

    public function route($uri, $method) {
        foreach($this->routes as $route) {
            $pattern = $this->createRoutePattern($route['uri']);
            if (preg_match($pattern, $uri, $matches) && $route['method'] === strtoupper($method)) {
                array_shift($matches);

                return require base_path('Http/Controllers/' . $route['controller']);
            }
        }
        Router::abort();  // Se nenhuma rota for encontrada
    }

    private function createRoutePattern($route) {
        return "@^" . preg_replace('/{[\w\d]+}/', '([\w\d-]+)', $route) . "$@D";
    }

    public static function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}