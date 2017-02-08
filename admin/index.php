<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 18.01.2017
 * Time: 15:36
 */

require __DIR__ . '/../autoload.php';

$controllerClassName = '\\App\\Controllers\\Admin';
$actionName = $_GET['action'] ?: 'All';

$controller = new $controllerClassName;
$controller->action($actionName);