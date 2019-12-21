<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;

class Cms extends Controller
{

    public function index()
    {
        if( !$user = User::getMe() )
            return $this->redirect('/auth/sign_in');

        if(
            $user->role != User::ROLE_ADMIN
            &&
            $user->role != User::ROLE_CONTENT_MANAGER
        ){
            return $this->redirect('/composer/cabinet');
        }

        echo $this->render('cms/index');
    }

}
