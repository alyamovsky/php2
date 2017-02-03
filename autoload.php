<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:19
 */

require __DIR__ . '/vendor/autoload.php';
    
function myapp_autoload($className)
{
    $filename = str_replace('\\', '/', $className);
    $path = __DIR__ . '/' . $filename . '.php';
    require $path;
}

spl_autoload_register('myapp_autoload');

