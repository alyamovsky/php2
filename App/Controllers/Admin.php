<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 29.01.2017
 * Time: 15:37
 */

namespace App\Controllers;


use App\Controller;
use App\Models\Article;

class Admin
    extends Controller
{
    
    public function actionAll()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->authors = \App\Models\Author::findAll();
        echo $this->view->render(__DIR__ . '/../Templates/admin.php');
    }

    public function actionEdit()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->authors = \App\Models\Author::findAll();
        if (isset($_GET['id'])) {
            $this->view->article = \App\Models\Article::findById($_GET['id']);
        }

        echo $this->view->render(__DIR__ . '/../Templates/admin_edit.php');
    }

    public function actionAdd()
    {
        $article = new \App\Models\Article;
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->author_id = $_POST['author_id'];
        $article->save();
        header('Location: /admin');
    }

    public function actionEditScript()
    {
        if (isset($_POST['delete'])) {
            \App\Models\Article::delete($_POST['id']);
        } else {
            $article = \App\Models\Article::findById($_POST['id']);
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            $article->author_id = $_POST['author_id'];
            $article->save();
        }
        header('Location: /admin');
    }
}