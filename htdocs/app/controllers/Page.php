<?php

namespace app\controllers;

use app\core\Controller;

class Page extends Controller
{

    public function index()
    {
        echo $this->render('page/index', [
            'clock' => date('H:i:s'),
        ]);
    }

    public function error404()
    {
        echo $this->render('page/error404');
    }

}
