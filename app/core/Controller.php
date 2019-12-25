<?php

namespace app\core;

use app\core\BaseClass;

class Controller extends BaseClass
{

    public $template = 'main';

    public function render($view, $params = [], $templateWrapper = true)
    {
        extract($params);

        if( $templateWrapper ){
            ob_clean();
            ob_start();
            require __DIR__ . "/../templates/{$this->template}.php";
            $output = ob_get_contents();
            ob_end_clean();
        }else{
            ob_start();
            require __DIR__ . "/../views/$view.php";
            $output = ob_get_contents();
            ob_end_clean();
        }

        return $output;
    }

    public function redirect($url, $prefix = true)
    {
        if( $prefix ){
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}$url";
        }

        return header("Location: $url");
    }

}
