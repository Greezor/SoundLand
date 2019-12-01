<?php

namespace app\core;

use app\core\BaseClass;

class CRUD extends BaseClass
{

    protected $config = [];

    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/db.php';

        //
    }

}
