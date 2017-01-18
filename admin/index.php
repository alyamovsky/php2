<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 18.01.2017
 * Time: 15:36
 */

include __DIR__ . '/../autoload.php';
$data = \App\Models\Article::findAll();

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    $id = $article->id;
    $title = $article->title;
    $text = $article->text;


}
include __DIR__ . '/../templates/admin.php';
