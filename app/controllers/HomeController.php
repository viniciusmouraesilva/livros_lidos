<?php

namespace app\controllers;

use app\models\Livro;

class HomeController extends ContainerController
{
    public function index()
    {
        $livro = new Livro();
        $livros = $livro->all();

        $this->view('home', [
            'title' => 'Home',
            'livros' => $livros
        ]);
    }
}