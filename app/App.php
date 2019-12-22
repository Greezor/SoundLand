<?php

namespace app;

use app\core\CRUD;
use app\core\Migration;
use app\core\Router;

class App
{

    public static $app;

    public $db;
    public $migration;
    public $router;

    protected function loader($dir, $fullClass)
    {
        $class = array_pop(explode('\\', $fullClass));

        $file = "$dir/$class.php";

        if( file_exists($file) ){
            require_once $file;
        }

        foreach(glob("$dir/*",  GLOB_ONLYDIR) as $subdir){
            $this->loader($subdir, $class);
        }
    }

    public function __construct()
    {
        static::$app =& $this;

        session_start();

        spl_autoload_register(function($class){
            $this->loader(__DIR__, $class);
        });

        $this->db = new CRUD();
        $this->migration = new Migration();
        $this->router = new Router();
    }

}
