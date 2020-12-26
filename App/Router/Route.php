<?php

namespace App\Router;
use App\Controller\Database\DatabaseController;

class Route {

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    /**
     * Constructeur
     * @param [type] $path
     * @param [type] $callable
     */
    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/'); // On retire les / inutils
        $this->callable = $callable;
    }

    /**
     * 
     * @param [type] $param
     * @param [type] $regex
     * @return void
     */
    public function with($param, $regex)
    {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    /**
     * Permet de capturer l'url avec les paramètre 
     * get('/posts/:slug-:id') par exemple
     * @param string $url
     * @return void
     */
    public function match($url){
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches; 
        return true;
    }

    /**
     * 
     * @param [type] $match
     * @return void
     */
    private function paramMatch($match){
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }
    /**
     *
     * @return void
     */
    public function call()
    {
        if (is_string($this->callable)) {
            // prend les parametres
            $params = explode('@', $this->callable);
            // il va chercher dans le dossier controller
            $controller = "App\\Controller\\" . $params[0] . "Controller";
            $controller = new $controller(DatabaseController::getPDO());
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }
    /**
     * 
     * @param [type] $params
     * @return void
     */
    public function getUrl($params)
    {
        $path = $this->path;
        foreach ($params as $key => $value) {
            $path = str_replace(":$key", $value, $path);
        }
        return $path;
    }
}