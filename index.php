<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:22
 */

require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);

if ('index.php' == $parts[1]) {
    $parts[1] = 'News';
}

$controllerName = ucfirst($parts[1]) ?: 'News';
$controllerClassName = '\\App\\Controllers\\' . $controllerName;
$actionName = ucfirst($parts[2]) ?: 'All';

try {
    $controller = new $controllerClassName;
    $controller->action($actionName);
} catch (\App\Exceptions\HttpException $e) {
    $controller->showErrorPage($e->getMessage());
    $logger = new \App\Logger();
    $logger->add($e->getMessage());
} catch (\App\Exceptions\DbException $e) {
    $controller->showErrorPage($e->getMessage());
    $logger = new \App\Logger();
    $logger->add($e->getMessage());
}