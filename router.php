<?php
class Router {
    private $routes = [];

    public function addRoute($path, $callback, $method = 'GET') {
        $this->routes[] = [
            'path' => rtrim($path, '/'),
            'callback' => $callback,
            'method' => strtoupper($method),
        ];
    }

    public function dispatch($uri, $requestMethod) {
        $uri = rtrim(parse_url($uri, PHP_URL_PATH), '/');
        $requestMethod = strtoupper($requestMethod);

        foreach ($this->routes as $route) {
            if ($route['path'] === $uri && $route['method'] === $requestMethod) {
                if (is_callable($route['callback'])) {
                    call_user_func($route['callback']);
                } else {
                    require $route['callback'];
                }
                return;
            }
        }

        $this->handleNotFound();
    }

    private function handleNotFound() {
        header("HTTP/1.0 404 Not Found");
        require 'views/404.php';
    }
}

// Create a new router instance
$router = new Router();

// Register your routes with the specified mappings
$router->addRoute('/', 'controllers/index.php');
$router->addRoute('/aboutus', 'controllers/aboutus.php');
$router->addRoute('/capacitybuilding', 'controllers/capacitybuilding.php');
$router->addRoute('/proneurship', 'controllers/proneurship.php');
$router->addRoute('/our-team', 'controllers/our-team.php');
$router->addRoute('/blog', 'controllers/blog.php');
$router->addRoute('/post','controllers/post.php');
$router->addRoute('/contact', 'controllers/contactus.php');
$router->addRoute('/admin', 'controllers/admin.php');

// Dispatch the current request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
