<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 18.01.2017
 * Time: 15:36
 */

include __DIR__ . '/../autoload.php';
$data = \App\Models\Article::findAll();

include __DIR__ . '/../App/Templates/admin.php';
