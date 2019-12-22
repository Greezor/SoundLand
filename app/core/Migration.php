<?php

namespace app\core;

use app\App;
use app\core\BaseClass;

class Migration extends BaseClass
{

    protected $version_file = __DIR__ . '/../config/db.version.json';

    public function get__db()
    {
        return App::$app->db;
    }

    public function get__version()
    {
        if( !file_exists($this->version_file) )
            $this->version = 'v0';

        return json_decode(file_get_contents($this->version_file), true);
    }

    public function set__version($v)
    {
        file_put_contents(
            $this->version_file,
            json_encode($v)
        );
    }

    public function get__migrations()
    {
        return glob(__DIR__ . '/../migrations/v*.php');
    }

    public function __construct()
    {
        $versions = array_map(
            function($file){
                return explode('.', end(explode('/', $file)))[0];
            },
            $this->migrations
        );

        for(
            $i = array_search($this->version, $versions) + 1;
            $i < count($this->migrations);
            $i++
        ){
            require_once($this->migrations[$i]);
        }

        $new_version = $versions[--$i];

        if( $this->version != $new_version )
            $this->version = $new_version;
    }

}
