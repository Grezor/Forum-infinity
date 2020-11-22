<?php 

namespace App\router;

class Router {

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    /**
     * 
     *
     * @param [type] $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }
    /**
     * 
     *
     * @param [type] $path
     * @param [type] $callable
     * @param [type] $name
     * @return void
     */
    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }
    
    /**
     * 
     *
     * @param [type] $path
     * @param [type] $callable
     * @param [type] $name
     * @return void
     */
    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * 
     *
     * @param [type] $path
     * @param [type] $callable
     * @param [type] $name
     * @param [type] $method
     * @return void
     */
    private function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        
        if(is_string($callable)&& $name === null){
            $name = $callable;
        }

        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function run()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }

    
    public function url($name, $params = [])
    {
        if (!isset($this->namedRoutes[$name])) {
            throw new RouterException('no matches this name');
        }
        return $this->namedRoute[$name]->getUrl($params);
    }
}