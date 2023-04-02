<?php
namespace Controller\Admin\Blog;

use Core\App;

class Categories extends App {

    /**
     * get model
     *
     * @return class
     */
    public function getModel()
    {
        return $this->Model('Model\Category', 'Category');
    }

    /**
     * get posts
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->getModel()->getCategories();
    }
}