<?php

namespace app\core;

use PDO;
use app\core\BaseClass;

class CRUD extends BaseClass
{

    protected $config = [];

    public $pdo;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/db.php';

        $this->pdo = new PDO(
            $this->config['dsn'],
            $this->config['user'],
            $this->config['pass'],
            [
                PDO::ATTR_PERSISTENT => true,
            ]
        );
    }

    public function create($table, $row)
    {
        $keys = array_keys($row);
        $columns = implode(', ', $keys);
        $values = implode(', ', array_map(
            function($key){
                return ":$key";
            },
            $keys
        ));

        $stmt = $this->pdo
            ->prepare("insert into $table ($columns) values ($values)");

        return $stmt->execute($row);
    }

    public function read($table, $condition = '', $params = [])
    {
        $stmt = $this->pdo
            ->prepare("select * from $table $condition");

        if( !$stmt->execute($params) )
            return [];

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $row, $condition = '', $params = [])
    {
        $pdo_update = [];

        foreach($row as $key => $value){
            $pdo_update["PDO__UPDATE_COLUMN->$key"] = $value;
        }

        $payload = implode(', ', array_map(
            function($column, $pdo_key){
                return "$column = :$pdo_key";
            },
            array_keys($row),
            array_keys($pdo_update)
        ));

        $stmt = $this->pdo
            ->prepare("update $table set $payload $condition");

        return $stmt->execute(array_merge(
            $pdo_update,
            $params
        ));
    }

    public function delete($table, $condition = '', $params = [])
    {
        $stmt = $this->pdo
            ->prepare("delete from $table $condition");

        return $stmt->execute($params);
    }

}
