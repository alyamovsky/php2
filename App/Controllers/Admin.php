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
    public function __construct()
    {
        parent::__construct();
        $this->view->news = \App\Models\Article::findAll();
        $this->view->authors = \App\Models\Author::findAll();
    }

    public function actionAll()
    {
        echo $this->view->render(__DIR__ . '/../Templates/admin.php');
    }

    public function actionEdit()
    {
        if (isset($_GET['id'])) {
            $this->view->article = \App\Models\Article::findById($_GET['id']);
        }

        echo $this->view->render(__DIR__ . '/../Templates/admin_edit.php');
    }

    public function saveParams(Article $obj)
    {
        foreach ($_POST as $key => $value) {
            $obj->$key = $value;
        }
        $obj->save();
    }

    public function actionAdd()
    {
        $article = new \App\Models\Article;
        $this->saveParams($article);
        header('Location: /admin');
    }

    public function actionEditScript()
    {
        if (isset($_POST['delete'])) {
            \App\Models\Article::delete($_POST['id']);
        } else {
            $article = \App\Models\Article::findById($_POST['id']);
            $this->saveParams($article);
        }
        header('Location: /admin');
    }
}