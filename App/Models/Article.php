<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 0:26
 */

namespace App\Models;

use App\Db;
use App\Model;

class Article
    extends Model
{
    public $id;
    public $title;
    public $text;
    const TABLE = 'news';

    public static function findLast(int $value = null): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC';
        if ((isset($value))) {
            $sql .= ' LIMIT ' . (int)$value;
        }
        return $db->query($sql, [], self::class);
    }

}