<?php

class Router {
    protected $routes = [];

    public function add($method, $path, $controller) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller
        ];
    }

    public function dispatch() {
        $url = isset($_GET['url']) ? '/' . rtrim($_GET['url'], '/') : '/';
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['path'] === $url && $route['method'] === $method) {
                
                [$controllerName, $actionName] = explode('@', $route['controller']);
                
                $controllerFile = 'app/Controllers/' . $controllerName . '.php';
                
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    
                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();
                        
                        if (method_exists($controller, $actionName)) {
                            $controller->$actionName();
                            return;
                        } else {
                            $this->handleError(500); 
                            return;
                        }
                    }
                }
            }
        }

        $this->handleError(404);
    }

    private function handleError($code) {
        require_once 'app/Controllers/ErrorController.php';
        $errorController = new ErrorController();

        if ($code == 404) {
            $errorController->notFound();
        } elseif ($code == 500) {
            $errorController->internalServer();
        }
    }
}