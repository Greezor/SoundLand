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
        $this->password = password_hash($value, PASSWORD_BCRYPT);
    }

    public function login($password)
    {
        $success = false;

        if( password_verify($password, $this->password) ){
            $_SESSION['user_id'] = $this->id;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

            $success = true;
        }

        return $success;
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['ip']);
    }

    public static function getMe()
    {
        if( isset($_SESSION['user_id']) && $_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] ){
            return self::find('where id = :id', [
                'id' => (int) $_SESSION['user_id'],
            ])[0];
        }

        return null;
    }

}
