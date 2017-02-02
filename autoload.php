<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:19
 */

function __autoload($className)
{
    $filename = str_replace('\\', '/', $className);
    $path = __DIR__ . '/' . $filename . '.php';
    require $path;
}