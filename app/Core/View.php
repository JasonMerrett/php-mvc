<?php

namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View {
    public $location = __DIR__.'/../Views';

    public function render($layout, $data = [])
    {
        $loader = new FilesystemLoader($this->location);
        $twig = new Environment($loader);

        return $twig->render($layout, $data);
    }
}