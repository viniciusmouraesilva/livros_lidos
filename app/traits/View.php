<?php
namespace app\traits;

use core\Twig;

trait View
{
    public function twig()
    {
        $twig = new Twig();
        $loadTwig = $twig->loadTwig();
        return $loadTwig;
    }

    public function view($view, $data)
    {
        $template = $this->twig()->load($view . '.html');
        return $template->display($data);
    }
}