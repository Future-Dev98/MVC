<?php
namespace MVC\Controller\Admin;

use Core\App;

class Index extends App {
    public function __construct()
    {
        require_once $this->View();
    }
}