<?php 

class Router{
    private $routes = [];
    protected $base_url;

    public function __construct($base_url) {
        $this->base_url = $base_url;
    }

    public function addRoutes($routes) {
        $this->routes = $routes;
    } 


    public function add($route, $controller, $method = 'index'){
        $this->routes[$route] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch($url) {
        foreach ($this->routes as $method => $routes) {
            foreach ($routes as $route => $handler) {
                $routeRegex = preg_replace('/:\w+/', '(\d+)', $route);
                
                if (preg_match("#^$routeRegex$#", $url, $matches)) {
                    array_shift($matches); 
                    list($controller, $action) = $handler;
    
                    $controllerName = 'App\\Controllers\\' . $controller;
                    if (class_exists($controllerName)) {
                        $controllerInstance = new $controllerName();
                        call_user_func_array([$controllerInstance, $action], $matches);
                    } else {
                        echo "Erreur : le contrôleur `{$controllerName}` n'a pas été trouvé.";
                    }
                    return;
                }
            }
        }
        echo " 404 - Page non trouvée.";
    }
    
    


    public function run() {
        $request_method = $_SERVER['REQUEST_METHOD'];
        $request_uri = str_replace($this->base_url, '', $_SERVER['REQUEST_URI']);
        
     
        
        if (isset($this->routes[$request_method][$request_uri])) {
            $route = $this->routes[$request_method][$request_uri];
            list($controller, $action) = $route;
            
            $controllerName = 'App\\Controllers\\' . $controller;
            if (class_exists($controllerName)) {
                $controllerInstance = new $controllerName();
                $controllerInstance->$action();
            } else {
                echo "Contrôleur non trouvé : $controllerName";
            }
        } else {
            echo "Route non définie";
        }
    }
    

}