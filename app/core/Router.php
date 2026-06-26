<?php
/**
 * Router
 *
 * Maps a "page" key (from ?page=...) to a controller class and method.
 */
class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $page): void
    {
        if (!isset($this->routes[$page])) {
            http_response_code(404);
            $page = 'home';
        }

        [$controllerClass, $method] = $this->routes[$page];

        $controller = new $controllerClass();
        $controller->$method();
    }
}
