<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 18.01.2017
 * Time: 20:29
 */
include __DIR__ . '/../autoload.php';
var_dump($_POST);
if (isset($_POST['delete'])) {
    \App\Models\Article::delete($_POST['id']);
} else {
    $article = new \App\Models\Article();
    $article->id = $_POST['id'];
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->save();
}
header('Location: /admin');