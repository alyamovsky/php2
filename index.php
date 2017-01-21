<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:22
 */

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findLast(3);

include __DIR__ . '/App/Templates/index.php';