<?php
namespace MVC;
class DefindPath {
    public function __construct()
    {
        var_dump($this->UrlProcess());
    }
    function UrlProcess() {
        if(isset($_SERVER['REQUEST_URI']) ){
            return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }
}