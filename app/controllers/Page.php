<?php

namespace app\controllers;

use app\core\Controller;
use app\models\News;

class Page extends Controller
{

    public function index()
    {
        echo $this->render('page/index', [
            'news' => News::find('order by date desc, id desc'),
        ]);
    }

    public function error404()
    {
        echo $this->render('page/error404');
    }

}
