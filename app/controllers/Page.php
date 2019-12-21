<?php

namespace app\controllers;

use app\core\Controller;

class Page extends Controller
{

    public function index()
    {
        echo $this->render('page/index');
    }

    public function error404()
    {
        echo $this->render('page/error404');
    }

}
