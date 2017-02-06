<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 06.02.2017
 * Time: 15:59
 */

namespace App\Controllers;


use App\Controller;

class Error
    extends Controller
{
    public function __construct()
    {
        $this->view = new \App\TwigView();
    }

    public function showErrorPage($message)
    {
        $this->view->message = $message;
        $this->view->title = 'Ошибка';
        echo $this->view->render('error.twig');
    }
}