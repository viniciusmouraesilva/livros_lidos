<?php

# Primeira etapa é a home meuslivros/ (index)
# Seugunda é o meuslivros/livro (controller)
# Quarta etapa meuslivros/livro/livro-php (parameter) 
# para (controller) livro

require '../bootstrap.php';

use core\Controller;
use core\Method;

try {
    $controller = new Controller;
    $controller = $controller->load();

    $method = new Method;
    $method = $method->load($controller);

    $controller->$method();

} catch (Exception $ex) {
    print $ex->getMessage();
}
