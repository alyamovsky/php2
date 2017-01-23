<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 16:34
 */

require __DIR__ . '/autoload.php';

$view = new \App\View();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$view->data = \App\Models\Article::findById($id);

$content = $view->render(__DIR__ . '/App/Templates/article.php');
echo $content;