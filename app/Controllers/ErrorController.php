<?php

namespace App\Controllers;

class ErrorController
{
    public function index(): void
    {
            $loader = new \Twig\Loader\FilesystemLoader('../app/views');
            $twig = new \Twig\Environment($loader);
            $content = $twig->render('error.html');
            echo $content;
    }
}
