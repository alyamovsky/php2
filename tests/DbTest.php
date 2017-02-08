<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 08.02.2017
 * Time: 14:03
 */

require __DIR__ . '/../autoload.php';

$db = new \App\Db();
$res = $db->queryEach('SELECT * FROM news', [], 'App\\Models\\Article');
foreach ($res as $item) {
    assert(is_object($item));
}

$articles = \App\Models\Article::findEach();

foreach ($articles as $article) {
    assert(is_object($article));
}