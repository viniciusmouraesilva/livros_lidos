<?php

use app\models\Lido;

function dd ($data) {
    var_dump($data);
    exit;
}

function livro_lido ($nome)
{
    $livro = new Lido;

    if ($lido = $livro->equal($nome, 'uri')) {
        if (is_object($lido)) {
            return $lido;
        }
    }
}