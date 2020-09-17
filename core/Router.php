<?php
  namespace App\Core;

  class Router {
    protected $routes = [
      'GET' => [],
      'POST' => []
    ];

    public static function load($fileName) {
      $router = new static;
      require $fileName;
      return $router;
    }

    public function define($routes) {
      $this->routes = $routes;
    }

    public function get($uri, $controllerName) {
      $this->routes['GET'][$uri] = $controllerName;
    }

    public function post($uri, $controllerName) {
      $this->routes['POST'][$uri] = $controllerName;
    }

    public function direct($uri, $method){
      $controllerAction;

      if(array_key_exists($uri, $this->routes[$method])) {
        $controllerAction = $this->routes[$method][$uri];
      } elseif (array_key_exists('', $this->routes)) {
        $controllerAction = $this->routes['GET'][''];
      } else {
        throw new Exception("No route has been defined for URI $uri");
      }


      return $this->callAction(
        // spread the array returned by the "split" function
        // [0] -> $controller
        // [1] -> $action
        ...explode('@', $controllerAction)
      );
    }

    protected function callAction($controller, $action) {
      $controllerName = "App\\Controllers\\{$controller}";
      $controllerInstance = new $controllerName;
    
      if(!method_exists($controllerInstance, $action)) {
        throw new Exception("There is no $action action on controller $controller!");
      }

      return ($controllerInstance)->$action();
    }
  }
?>