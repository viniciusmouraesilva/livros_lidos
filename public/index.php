<?php

# Primeira etapa é a home meuslivros/ (index)
# Seugunda é o meuslivros/livro (controller)
# Quarta etapa meuslivros/livro/livro-php (parameter) 
# para (controller) livro

require '../bootstrap.php';

use core\Controller;
use core\Method;
use core\Parameter;

try {
    $controller = new Controller;
    $controller = $controller->load();

    $method = new Method;
    $method = $method->load($controller);

    if (is_array($method)) {
        list($method, $values) = $method;
        $controller->$method($values);
    } else {
        $controller->$method();
    }

    #$parameter = new Parameter();
    #$parameter = $parameter->load();
} catch (Exception $ex) {
    print $ex->getMessage();
}
