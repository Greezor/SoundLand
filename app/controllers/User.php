<?php

namespace app\controllers;

use app\core\Controller;

class User extends Controller
{

    public function cabinet()
    {
        echo $this->render('user/cabinet');
    }

}
