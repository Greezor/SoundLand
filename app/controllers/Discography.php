<?php

namespace app\controllers;

use app\core\Controller;

class Discography extends Controller
{

    public function groups()
    {
        echo $this->render('discography/groups');
    }

}