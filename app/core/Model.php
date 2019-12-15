<?php

namespace app\core;

use app\App;
use app\core\BaseClass;

class Model extends BaseClass
{

    public $__isNew = true;
    public $__attributes = [];

    public function __get($column)
    {
        if( array_key_exists($column, $this->__attributes) )
            return $this->__attributes[$column];

        return parent::__get($column);
    }

    public function __set($column, $value)
    {
        if( array_key_exists($column, $this->__attributes) )
            return $this->__attributes[$column] = $value;

        return parent::__set($column, $value);
    }

    public static function getDB()
    {
        return App::$app->db;
    }

    public function get__db()
    {
        return static::getDB();
    }

    public static function tableName()
    {
        return null;
    }

    public static $__schema = null;
    public function get__schema()
    {
        if( !static::$__schema ){
            static::$__schema = [];

            foreach(
                $this->db->pdo
                    ->query('describe ' . static::tableName())
                as
                $attr
            ){
                static::$__schema[$attr['Field']] = null;
            }
        }

        return static::$__schema;
    }

    public static function find($condition = '', $params = [])
    {
        return array_map(
            function($row){
                return new static($row, false);
            },
            static::getDB()
                ->read(
                    static::tableName(),
                    $condition,
                    $params
                )
        );
    }

    public function __construct($row = [], $isNew = true)
    {
        $this->__attributes = array_merge(
            $this->schema,
            $row
        );

        $this->__isNew = $isNew;
    }

    public function save()
    {
        $success = false;

        if( $this->__isNew ){
            $success = $this->db->create(
                static::tableName(),
                $this->__attributes
            );

            if( $success ){
                $this->id = $this->db->pdo->lastInsertId();
                $this->__isNew = false;
            }
        }else{
            $success = $this->db->update(
                static::tableName(),
                $this->__attributes,
                'where id = :id',
                [ 'id' => $this->id ]
            );
        }

        return $success;
    }

    public function delete()
    {
        if( $this->__isNew )
            return true;

        return $this->db->delete(
            static::tableName(),
            'where id = :id',
            [ 'id' => $this->id ]
        );
    }

}
