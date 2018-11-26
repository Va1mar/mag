<?php


// Общие настройки



ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Подключение файлов
define('ROOT', dirname(__FILE__));

spl_autoload_register(function($class_name) {
    $paths = array(
        '/components/',
        '/models/'
    );
    
    foreach($paths as $path) {
        $filename = ROOT.$path.$class_name.'.php';
        if(is_file($filename))
            require_once $filename;
    }
});


// Работа роутера

$router = new Router();
$router->run();

?>