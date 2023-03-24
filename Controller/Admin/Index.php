<?php
namespace MVC\Controller\Admin;

class Index extends App {
    public function __construct()
    {
        require_once $this->View();
    }
}