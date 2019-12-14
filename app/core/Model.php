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

    public function get__db()
    {
        return App::$app->db;
    }

    public function tableName()
    {
        return strtolower(get_class($this));
    }

    public static $__schema = null;
    public function get__schema()
    {
        if( !self::$__schema ){
            self::$__schema = [];

            foreach(
                $this->db->pdo
                    ->query('describe ' . $this->tableName())
                as
                $attr
            ){
                self::$__schema[$attr->Field] = null;
            }
        }

        return self::$__schema;
    }

    public static function find($condition = '', $params = [])
    {
        return array_map(
            function($row){
                return new self($row, false);
            },
            $this->db->read(
                $this->tableName(),
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
                $this->tableName(),
                $this->__attributes
            );

            if( $success ){
                $this->id = $this->db->pdo->lastInsertId();
                $this->__isNew = false;
            }
        }else{
            $success = $this->db->update(
                $this->tableName(),
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
            $this->tableName(),
            'where id = :id',
            [ 'id' => $this->id ]
        );
    }

}