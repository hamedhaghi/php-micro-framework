<?php

declare(strict_types=1);

namespace App\Core;

use Exception;

class Router
{
    private array $routes = [];
    private array $server = [];

    public function __construct(
    ) {
        $this->server = $_SERVER;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    protected function addRoute(
        string $path,
        string $controller,
        string $action,
        string $method,
        array $args = []
    ): void {
        $this->routes[] = [
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'method' => $method,
            'args' => $args,
        ];
    }

    public function get(string $path, string $controller, string $action): void
    {
        $this->addRoute($path, $controller, $action, 'GET', $_GET);
    }

    public function post(string $path, string $controller, string $action): void
    {
        $this->addRoute($path, $controller, $action, 'POST', $_POST);
    }

    public function put(string $path, string $controller, string $action): void
    {
        $this->addRoute($path, $controller, $action, 'PUT', $_POST);
    }

    public function delete(string $path, string $controller, string $action): void
    {
        $this->addRoute($path, $controller, $action, 'DELETE', $_POST);
    }

    public function load(): void
    {
        $path = $this->server['REQUEST_URI'];
        $method = $this->server['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['path'] === $path && $route['method'] === $method) {
                $controller = $route['controller'];
                $action = $route['action'];
                $args = $route['args'];
                $controller = new $controller();
                if (!method_exists($controller, $action)) {
                    throw new Exception('Action not found');
                }
                echo $controller->$action(...$args);
                return;
            }
        }

        $this->abort();
    }

    public function abort(): void
    {
        http_response_code(404);
        echo 'Page not found';
        exit;
    }
}
