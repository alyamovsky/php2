<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 16:34
 */
require __DIR__ . '/autoload.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$data = \App\Models\Article::findById($id);

include __DIR__ . '/Templates/article.php';