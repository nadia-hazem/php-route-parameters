<?php

declare(strict_types=1);

/**
 * Handles application routing.
 *
 * Registers routes and dispatches incoming HTTP requests
 * to the appropriate controller or callback.
 *
 * Routes may contain parameters, e.g. /users/{id}.
 * Captured values are passed to the action as named arguments.
 */

namespace App\Core;

class Router
{
    private array $routes = [];

    /**
     * Register a GET route.
     *
     * @param string $uri    Static (/about) or dynamic (/users/{id}) route
     * @param mixed  $action [Controller::class, 'method'] or a callable
     */
    public function get(string $uri, mixed $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes[$method] ?? [] as $route => $action) {

            // Extract parameter names from the route definition
            preg_match_all('#\{([^}]+)\}#', $route, $paramNames);

            // Convert route parameters into a regular expression pattern
            $pattern = preg_replace('#\{[^}]+\}#', '([^/]+)', $route);

            // Check whether the requested URI matches the route pattern
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {

                // Remove the full match, keep only the captured values
                array_shift($matches);

                // Combine parameter names with their values
                $params = array_combine($paramNames[1], $matches);

                // Controller actions are stored as [Controller::class, 'method']
                if (is_array($action)) {

                    // Split the controller class name and method name
                    [$controller, $methodName] = $action;

                    // Instantiate the controller dynamically
                    $controller = new $controller();

                    // Pass route parameters as named arguments
                    $controller->$methodName(...$params);

                } else {

                    call_user_func_array($action, $params);

                }

                return;
            }
        }

        http_response_code(404);
        echo '404 - Page not found';
    }
}
