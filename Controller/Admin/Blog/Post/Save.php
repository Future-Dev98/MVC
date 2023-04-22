<?php

namespace Controller\Admin\Blog\Post;

use Core\App;

class Save extends App {

    public function __construct()
    {
        $this->savePost();
    }

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
     * Undocumented function
     *
     * @param string $title
     * @param string $content
     * @param string $thumbnail_image
     * @param string $url_key
     * @param int $post_status
     * @return void
     */
    public function savePost()
    {
        $params = $_REQUEST;
        echo '<pre>';
        var_dump($params);
        echo '</pre>';
        //return $this->getModel()->save($title, $content, $thumbnail_image, $url_key, $post_status);
    }
}

$save = new Save();