<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;
use app\models\Discography as DiscographyModel;

class Discography extends Controller
{

    public function groups()
    {
        echo $this->render('discography/groups', [
            'groups' => User::find('where role = :role', [
                'role' => User::ROLE_USER,
            ]),
        ]);
    }

    public function group()
    {
        $me = User::getMe();

        $user = User::find('where id = :id and role = :role', [
            'id' => (int) $_GET['id'],
            'role' => User::ROLE_USER,
        ])[0];

        if( !$user )
            return $this->redirect('/discography/groups');

        echo $this->render('discography/group', [
            'me' => $me,
            'user' => $user,
            'isMy' => !!$me && $me->id == $user->id,
            'tracks' => DiscographyModel::find('where user_id = :user_id', [
                'user_id' => (int) $user->id,
            ])
        ]);
    }

    public function add()
    {
        if( !$user = User::getMe() )
            return $this->redirect('/auth/sign_in');

        $form = [];
        $error = false;

        if( $_POST ){
            $form = $_POST['Discography'];

            $track = new DiscographyModel;
            $track->user_id = (int) $user->id;

            if( !!$form['name'] )
                $track->name = $form['name'];

            $track->album = $form['album'];

            if( $_FILES['track'] )
                $track->audio = $_FILES['track'];

            if( $track->save() )
                return $this->redirect('/discography/group?id=' . $user->id);

            $error = true;
        }

        echo $this->render('discography/add', [
            'form' => $form,
            'error' => $error,
        ]);
    }

    public function delete()
    {
        if( !$user = User::getMe() )
            return $this->redirect('/auth/sign_in');

        $track = DiscographyModel::find('where id = :id and ( user_id = :user_id or :force )', [
            'id' => (int) $_GET['id'],
            'user_id' => (int) $user->id,
            'force' => (bool) (
                $user->role == User::ROLE_ADMIN
                ||
                $user->role == User::ROLE_CONTENT_MANAGER
            ),
        ])[0];

        if( !!$track )
            $track->delete();

        return $this->redirect('/discography/group?id=' . $track->user_id);
    }

}
