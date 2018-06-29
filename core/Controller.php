<?php

namespace core;

use app\src\Uri;
use app\exceptions\ControllerNotExistException;

class Controller
{
    private $uri;
    private $namespace;
    private $controller;
    private $folders = [
        'app\controllers'
    ];

    public function __construct()
    {
        $this->uri = Uri::uri();
    }

    public function load()
    {
        if ($this->isHome()) {
            return $this->controllerHome();
        }

        return $this->isNotHome();
    }

    private function isHome()
    {
        return ($this->uri == '/');
    }

    private function isNotHome()
    {
        if (substr_count($this->uri, '/') >= 1) {
            return $this->controllerNotHome();
        }
    }

    private function controllerNotHome()
    {
        $data = array_values(array_filter(explode('/', $this->uri)));
        $controller = ucfirst($data[0]) . 'Controller';
        
        if (!$this->controllerExist($controller)) {
            throw new ControllerNotExistException('Não foi possível encontrar uma rota');
        }

        return $this->instantiateController();
    }

    private function controllerHome()
    {
        if (!$this->controllerExist('HomeController')) {
            throw new ControllerNotExistException('Não foi possível encontrar uma rota');
        }

        return $this->instantiateController();
    }

    private function controllerExist($controller)
    {
        $controllerExist = false;

        foreach ($this->folders as $folder) {
            if (class_exists($folder . '\\' . $controller)) {
                $controllerExist = true;
                $this->namespace = $folder;
                $this->controller = $controller;
            }
        }
        
        return $controllerExist;
    }

    private function instantiateController()
    {
        $controller =  $this->namespace . '\\' . $this->controller;
        return new $controller;
    }
}