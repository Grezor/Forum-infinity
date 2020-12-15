<?php
namespace App\autoloader;

class Autoloader {
    
    static function autoloader($classname)
    {
        require 'controller/' . $classname . '.php';
    }
}