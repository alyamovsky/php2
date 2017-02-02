<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 13:08
 */

namespace App\Models;

use App\Db;
use App\Model;

class Author
    extends Model
{
    public $id;
    public $firstname;
    public $lastname;

    const TABLE = 'authors';

    public function getName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}