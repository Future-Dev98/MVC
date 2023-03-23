<?php
namespace MVC\Controller\Frontend;

class Index extends MVC\Core\App {
    public function __construct()
    {
        require $this->View();
    }
}

