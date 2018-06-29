<?php

namespace core;

use app\src\Uri;
use app\exceptions\MethodNotExistException;

class Method
{
    private $uri;
    private $controller;

    public function __construct()
    {
        $this->uri = Uri::uri();
    }

    public function load($controller)
    {
        if ($this->isHome()) {
            return 'index';
        }

        if ($method = $this->isLidoController()) {
            if (is_array($method)) {
                return $method;
            }
        }

        $this->controller = $controller;
        return $this->isNotHome();
    }

    private function isHome()
    {
        return ($this->uri == '/');
    }

    private function isNotHome()
    {
        if (substr_count($this->uri, '/') > 1) {
            $method_uri = array_values(array_filter(explode('/', $this->uri)));
            $method = $method_uri[1] ?? 'index';
            $this->isMethod($method);
            return $method;
        }

        return 'index';
    }

    private function isMethod($method)
    {
        if (!method_exists($this->controller, $method)) {
            throw new MethodNotExistException('Não foi possível encontrar esta rota');
        }
    }

    private function isLidoController() {
        $method_uri = array_values(array_filter(explode('/', $this->uri)));
        
        if ($method_uri[0] == 'lidos' && isset($method_uri[1])) {
            $method = $this->getLidoController($method_uri[1]);
            return $method;
        }

        return;
    }

    private function getLidoController($method)
    {
        $lido = livro_lido($method);

        if (is_object($lido)) {
            $method = ['search', $lido];
            return $method;
        }
    }
}