<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 27.01.2017
 * Time: 23:16
 */

namespace App;


use App\Exceptions\HttpException;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new \App\View();
    }

    protected function beforeAction()
    {

    }

    protected function access(): bool
    {
        return true;
    }

    public function action(string $name)
    {
        $this->beforeAction();
        $actionName = 'action' . $name;
        if ($this->access()) {
            $this->$actionName();
        } else {
            die('Restricted');
        }
    }

    public function showErrorPage($message)
    {
        $this->view->message = $message;
        $this->view->title = 'Ошибка';
        echo $this->view->render('error.twig');
    }
}