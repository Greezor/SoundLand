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

            if( isset($_FILES['avatar']) ){
                $file = file_get_contents(
                    $_FILES['avatar']['tmp_name']
                );

                $base64 = base64_encode($file);
                $mime = $_FILES['avatar']['type'];

                if( !!$file )
                    $user->icon = "data:$mime;base64,$base64";
            }

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
