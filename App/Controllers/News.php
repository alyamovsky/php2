<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 27.01.2017
 * Time: 23:22
 */

namespace App\Controllers;


use App\Controller;
use App\Models\Article;

class News
    extends Controller
{
    public function actionAll()
    {
        $this->view->news = Article::findLast(3);
        echo $this->view->render(__DIR__ . '/../Templates/index.php');
    }

    public function actionOne()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        $id = $parts[3];
        $this->view->article = \App\Models\Article::findById($id);
        echo $this->view->render(__DIR__ . '/../Templates/article.php');
    }

}