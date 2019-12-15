<?php

namespace app\controllers;

use app\core\Controller;

class Composer extends Controller
{

    public function cabinet()
    {
        echo $this->render('composer/cabinet');
    }

}
