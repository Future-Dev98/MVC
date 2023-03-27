<?php
namespace Controller\Admin\Blog;

use Core\App;

class Post extends App {
    public function __construct()
    {
        $this->Model('Post');
    }
}