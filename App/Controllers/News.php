<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 27.01.2017
 * Time: 23:22
 */

namespace App\Controllers;


use App\Controller;
use App\Exceptions\HttpException;
use App\Models\Article;

class News
    extends Controller
{

    public function __construct()
    {
        $this->view = new \App\TwigView();
    }

    public function actionAll()
    {
        $this->view->news = Article::findLast(3);
        echo $this->view->render('index.twig');
    }

    public function actionOne()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        if (empty($this->view->article)) {
            throw new HttpException('404 - страница с id ' . $_GET['id'] . ' не найдена');
        }
        echo $this->view->render('article.twig');
    }
}