<?php

class Router
{
    private $routes = [];

    public function addRoute($path, $controller, $method)
    {
        $this->routes[$path] = ['controller' => $controller, 'method' => $method];
    }

    public function handleRequest()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$path])) {
            $route = $this->routes[$path];
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            require_once CONTROLLERS . "/$controllerName.php";
            $controller = new $controllerName();
            call_user_func([$controller, $methodName]);
        } else {
            http_response_code(404);
            echo "404 - Страница не найдена";
        }
    }
}
