<?php 

namespace App\Router;

use Exception;

class Router {

    private $url;
    private $routes = [];


    public function __construct($url)
    {
        
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does not exist');
        }

        // parcours les routes
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            // si matches
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        throw new RouterException('not matching routes');
    }
}