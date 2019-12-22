<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;

class Composer extends Controller
{

    public function cabinet()
    {
        if( !$user = User::getMe() )
            return $this->redirect('/auth/sign_in');

        $edited = false;

        if( $_POST ){
            $form = $_POST['User'];

            if( isset($_FILES['avatar']) )
                $user->icon = $_FILES['avatar'];

            if( !!$form['nickname'] )
                $user->nickname = $form['nickname'];

            $edited = $user->save();
        }

        echo $this->render('composer/cabinet', [
            'user' => $user,
            'edit' => (bool) $_GET['edit'],
            'edited' => $edited,
        ]);
    }

}
