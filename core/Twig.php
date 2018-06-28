<?php

namespace core;

class Twig
{
    private $twig;

    public function loadTwig()
    {
        $this->twig = new \Twig_Environment($this->loadViews(), [
            'debug' => true,
            'auto_reload' => true
        ]);

        return $this->twig;
    }

    public function loadViews()
    {
        return new \Twig_Loader_Filesystem('../app/views');
    }
}