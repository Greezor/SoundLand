<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;

class Auth extends Controller
{

    public function sign_in()
    {
        if( !!User::getMe() )
            return $this->redirect('/user/cabinet');

        $form = [];
        $error = null;

        if( $_POST ){
            $form = $_POST['User'];

            $user = User::find('where login = :login', [
                'login' => $form['login'],
            ])[0];

            if( !!$user && $user->login($form['password']) ){
                return $this->redirect('/user/cabinet');
            }

            $error = 'Неверный логин и/или пароль';
        }

        echo $this->render('auth/sign_in', [
            'signed_up' => (bool) $_GET['signed_up'],
            'form' => $form,
            'error' => $error,
        ]);
    }

    public function sign_up()
    {
        if( !!User::getMe() )
            return $this->redirect('/user/cabinet');

        $form = [];
        $errors = [];

        if( $_POST ){
            $form = $_POST['User'];

            if( !$form['login'] ){
                $errors['login'] = 'Обязательно для заполнения';
            }else{
                $users = User::find('where login = :login', [
                    'login' => $form['login'],
                ]);

                if( count($users) )
                    $errors['login'] = 'Логин занят';
            }

            if( !$form['nickname'] )
                $errors['nickname'] = 'Обязательно для заполнения';

            if( !$form['password'] )
                $errors['password'] = 'Обязательно для заполнения';

            if( $form['password'] != $form['password_repeat'] )
                $errors['password_repeat'] = 'Пароли должны совпадать';

            if( !count($errors) ){
                $user = new User;
                $user->login = $form['login'];
                $user->nickname = $form['nickname'];
                $user->autopass = $form['password'];
                $user->role = User::ROLE_USER;

                if( $user->save() )
                    return $this->redirect('/auth/sign_in?signed_up=1');
                else
                    $errors['server'] = 'Внутренняя ошибка сервера, обратитесь к администатору';
            }
        }

        echo $this->render('auth/sign_up', [
            'form' => $form,
            'errors' => $errors,
        ]);
    }

    public function logout()
    {
        if( !!$user = User::getMe() )
            $user->logout();

        return $this->redirect('/');
    }

}
