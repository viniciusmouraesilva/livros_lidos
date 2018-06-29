<?php

namespace core;

use app\src\Uri;

class Parameter
{
    public function __construct()
    {
        $this->uri = Uri::uri();
    }

    public function load()
    {
        if (substr_count($this->uri, '/') > 2) {
            $parameter_uri = explode('/', $this->uri);
            dd($parameter_uri);
        }
    }
}