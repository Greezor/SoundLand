<?php

namespace app\models;

use app\core\Model;

class Discography extends Model
{

    public static function tableName()
    {
        return 'discography';
    }

    public function get__audio()
    {
        return $this->track;
    }

    public function set__audio($value)
    {
        $file = file_get_contents(
            $value['tmp_name']
        );

        $base64 = base64_encode($file);
        $mime = $value['type'];

        if( !!$file )
            $this->track = "data:$mime;base64,$base64";
    }

}
