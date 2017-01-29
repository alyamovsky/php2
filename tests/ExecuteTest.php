<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 14:49
 */

require __DIR__ . '/../autoload.php';

$db = new \App\Db();
$query = 'UPDATE authors SET firstname=:firstname WHERE id=:id';
$params = [
    ':id' => 1,
    ':firstname' => 'Илья'
];
assert($db->execute($query, $params));