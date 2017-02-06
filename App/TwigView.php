<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 03.02.2017
 * Time: 19:48
 */

namespace App;


class TwigView
{
    public $twigObj;
    use TMagic;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../App/Templates');
        $this->twigObj = new \Twig_Environment($loader, [
            'cache' => '/../App/cache/compilation_cache',
        ]);
    }

    public function render($template)
    {
        return $this->twigObj->render($template, $this->data);
    }
}