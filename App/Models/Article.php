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
    public $author_id;
    const TABLE = 'news';

    /**
     * @return \App\Models\Author
     */
    public function __get($name)
    {
        if (($name == 'author') && (isset($this->author_id))) {
            return \App\Models\Author::findById($this->author_id);
        }
    }


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