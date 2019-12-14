<?php

namespace app\models;

use app\core\Model;

class User extends Model
{

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_CONTENT_MANAGER = 'content_manager';

    public static function tableName()
    {
        return 'user';
    }

    public function set__autopass($value)
    {
        $this->password = md5($value);
    }

}
