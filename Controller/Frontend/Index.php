<?php
namespace MVC\Controller\Frontend;

use MVC\Core\App;

class Index extends App {
    public function __construct()
    {
        require_once $this->View();
    }
}