<?php
namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View {
    private static $twig;

    public static function init() {
        if (!self::$twig) {
            $loader = new FilesystemLoader('../app/views');
            self::$twig = new Environment($loader);
        }
    }

    public static function render($template, $data = []) {
        self::init(); 
        echo self::$twig->render($template, $data);
    }
}

