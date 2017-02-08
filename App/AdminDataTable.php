<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 08.02.2017
 * Time: 15:44
 */

namespace App;


class AdminDataTable
{
    public $models = [];
    public $functions = [];
    public $view;

    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render($template)
    {
        $this->view = new View();
        $this->view->models = $this->models[0];
        $this->view->functions = $this->functions;
        $this->view->authors = \App\Models\Author::findAll();
        return $this->view->render($template);
    }
}