<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:22
 */

/**
 * Подключение автозагрузки
 */
require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->news = \App\Models\Article::findLast(3);
$view->author = \App\Models\Author::findById(1);

//var_dump($view);
$content = $view->render(__DIR__ . '/App/Templates/index.php');
echo $content;