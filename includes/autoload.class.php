<?php

function autoloadClass($className)
{

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $path = "classes/";

    if (strpos($url, 'includes') !== false) {
        $path = "../classes/";
    }
    $extname  = ".class.php";

    $fullPath = $path . strtolower($className) . $extname;

    if (!is_file($fullPath)) {
        return false;
    }
    require_once($fullPath);
}
spl_autoload_register('autoloadClass');
