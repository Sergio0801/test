<?php

class Router
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        if (empty($url[0])) {
            require_once 'controllers/index.php';
            $controller = new Index();
            $controller->loadModel('index');
            $controller->index();
            return false;
        }
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $controller = new Error();
            return false;

        }

        if (isset ($url[0])) {
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            $controller->index();
        }
    }
}