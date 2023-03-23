<?php
namespace MVC\Controller\Frontend;

class Index extends App {
    public function __construct()
    {
        require $this->View();
    }
}

echo '111';