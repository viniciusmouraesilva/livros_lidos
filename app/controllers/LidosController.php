<?php

namespace app\controllers;

class LidosController
{
    public function index($parameter = '')
    {
        print 'index lidos';
    }

    public function search($data)
    {
        print 'search lidos';
        dd($data);
    }
}