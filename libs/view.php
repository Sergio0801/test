<?php

class View
{
    public function render($name, $data = false, $noinclude = false)
    {
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.php';
        }
    }
}