<?php

namespace app\models;

use app\core\Model;

class News extends Model
{

    public static function tableName()
    {
        return 'news';
    }

    public function get__humanDate()
    {
        return date('Y-m-d', $this->date);
    }

    public function set__humanDate($value) // value need format: Y-m-d (2019-12-31)
    {
        $this->date = strtotime($value);
    }

    public function __construct($row = [], $isNew = true)
    {
        parent::__construct($row, $isNew);

        if( !$this->date )
            $this->date = time();
    }

}
