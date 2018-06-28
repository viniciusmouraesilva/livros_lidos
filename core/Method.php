<?php

namespace core;

use app\src\Uri;

class Method
{
    private $uri;

    public function __construct()
    {
        $this->uri = Uri::uri();
    }

    public function load($controller)
    {
        if ($this->isHome()) {
            return 'index';
        }
    }

    private function isHome()
    {
        return ($this->uri == '/');
    }
}