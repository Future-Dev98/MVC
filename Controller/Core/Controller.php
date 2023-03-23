<?php
namespace MVC\Core;
class Controller {
    public function __construct()
    {
        var_dump($this->UrlProcess());
    }
    public function View($filePath)
    {
        $notfoundPage = SITE_URL . 'page/404.php';
        $file = $filePath . '.php';
        $viewPage = file_exists($file) ? $file : $notfoundPage;
        require $viewPage;
    }

    public function Controller($filePath)
    {
        # code...
    }

    function UrlProcess() {
        if(isset($_SERVER['REQUEST_URI']) ){
            return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }
}