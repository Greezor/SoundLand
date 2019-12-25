<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;
use app\models\News;

class Cms extends Controller
{

    public function index()
    {
        $me = $this->checkAccess();

        echo $this->render('cms/index', [
            'me' => $me,
        ]);
    }

    public function news()
    {
        $this->checkAccess();

        echo $this->render('cms/news', [
            'news' => News::find('order by date desc, id desc'),
        ]);
    }

    public function news_form()
    {
        $this->checkAccess();

        $error = false;

        $news = News::find('where id = :id', [
            'id' => (int) $_GET['id'],
        ])[0];

        if( !$news )
            $news = new News;

        if( $_POST ){
            $form = $_POST['News'];

            $news->name = $form['name'];
            $news->humanDate = $form['date'];
            $news->content = $form['content'];

            if( !!$news->name && !!$news->date && $news->save() )
                return $this->redirect('/cms/news');

            $error = true;
        }

        echo $this->render('cms/news_form', [
            'news' => $news,
            'error' => $error,
        ]);
    }

    public function delete_news()
    {
        $this->checkAccess();

        $news = News::find('where id = :id', [
            'id' => (int) $_GET['id'],
        ])[0];

        if( !!$news )
            $news->delete();

        return $this->redirect('/cms/news');
    }

    public function users()
    {
        $me = $this->checkAccessForAdminOnly();

        echo $this->render('cms/users', [
            'users' => User::find('where id <> :id', [
                'id' => $me->id,
            ]),
        ]);
    }

    public function user_form()
    {
        $this->checkAccessForAdminOnly();

        $error = false;

        $user = User::find('where id = :id', [
            'id' => (int) $_GET['id'],
        ])[0];

        if( !$user )
            $user = new User;

        if( $_POST ){
            $form = $_POST['User'];

            $user->login = $form['login'];
            $user->nickname = $form['nickname'];
            $user->role = $form['role'];

            if( !!$form['password'] )
                $user->autopass = $form['password'];

            if( !!$user->login && !!$user->nickname && !!$user->password && $user->save() )
                return $this->redirect('/cms/users');

            $error = true;
        }

        echo $this->render('cms/user_form', [
            'user' => $user,
            'error' => $error,
        ]);
    }

    public function delete_user()
    {
        $this->checkAccessForAdminOnly();

        $user = User::find('where id = :id', [
            'id' => (int) $_GET['id'],
        ])[0];

        if( !!$user )
            $user->delete();

        return $this->redirect('/cms/users');
    }





    protected function checkAccess()
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

        return $user;
    }

    protected function checkAccessForAdminOnly()
    {
        if( !$user = User::getMe() )
            return $this->redirect('/auth/sign_in');

        if( $user->role != User::ROLE_ADMIN )
            return $this->redirect('/composer/cabinet');

        return $user;
    }

}
