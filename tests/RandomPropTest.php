<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 22.01.2017
 * Time: 20:48
 */

require __DIR__ . '/../autoload.php';

$view = new \App\View();

$view->testProp = 'foo';
$view->testProp2 = 'bar';

assert(count($view) == 2);
assert($view->getData()[testProp2] == 'bar');
