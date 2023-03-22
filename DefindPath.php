<?php
namespace MVC;
class DefindPath {
    public function __construct()
    {
        var_dump($_SERVER['REQUEST_URL']);
    }
    function UrlProcess() {
        if(isset($_SERVER['REQUEST_URI']) ){
            return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }
    }
}