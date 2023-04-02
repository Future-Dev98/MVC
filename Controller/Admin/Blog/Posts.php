<?php
namespace Controller\Admin\Blog;

use Core\App;

class Posts extends App {
    /**
     * get model
     *
     * @return class
     */
    public function getModel()
    {
        return $this->Model('Model\Post', 'Post');
    }

    /**
     * get posts
     *
     * @return array
     */
    public function getPosts()
    {
        return $this->getModel()->getPosts();
    }
}