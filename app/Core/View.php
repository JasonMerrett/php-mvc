<?php

namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View {
    public static $location = __DIR__.'/../Views';

    public static function render($layout, $data = [])
    {
        $loader = new FilesystemLoader(self::$location);
        $twig = new Environment($loader, ['debug' => getenv('ENV') === 'development' ? true : false]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        return $twig->render($layout, $data);
    }
}