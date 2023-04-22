<?php

namespace Model;

use Api\PostInterface;
use Model\Database;

class Post implements PostInterface {

    /**
     * Database
     *
     * @var Database
     */
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    /**
     * get post list
     *
     * @return array
     */
    public function getPosts()
    {
        $conn = $this->database->ConnectDB();
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'SELECT * FROM posts';
        $result = $conn->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    /**
     * get post list
     *
     * @param $categoryId
     * @return array
     */
    public function getPostsByCategoryId($categoryId)
    {
        $conn = $this->database->ConnectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'SELECT * FROM posts JOIN category_posts ON posts.entity_id = category_posts.entity_id WHERE category_id = '.$categoryId.'';
        $result = $conn->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    /**
     * Save post data
     *
     * @param string $title
     * @param string $content
     * @param string $thumbnail_image
     * @param string $url_key
     * @param int $post_status
     * @return boolean
     */
    public function save($title, $content, $thumbnail_image, $url_key, $post_status)
    {
        $conn = $this->database->ConnectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO posts (title, content, thumbnail_image, url_key, post_status)
                VALUES ($title, $content, $thumbnail_image, $url_key, $post_status)";
        
        return $conn->query($sql);

    }

    /**
     * get ID
     *
     * @param array $arr
     * @return int
     */
    public function getID($arr)
    {
        return $arr['entity_id'];
    }

    /**
     * get title
     *
     * @param array $arr
     * @return string
     */
    public function getTitle($arr)
    {
        return $arr['title'];
    }

    /**
     * get content
     *
     * @param array $arr
     * @return string
     */
    public function getContent($arr)
    {
        return $arr['content'];
    }

    /**
     * get thumbnail image
     *
     * @param array $arr
     * @return string
     */
    public function getThumbnailImage($arr)
    {
        return $arr['thumbnail_image'];
    }

    /**
     * get url key
     *
     * @param array $arr
     * @return string
     */
    public function getUrlKey($arr)
    {
        return $arr['url_key'];
    }

    /**
     * get status
     *
     * @param array $arr
     * @return int
     */
    public function getStatus($arr)
    {
        return $arr['post_status'];
    }

    /**
     * get create at time
     *
     * @param array $arr
     * @return date
     */
    public function getCreateAt($arr)
    {
        return $arr['create_at'];
    }

    /**
     * get update at time
     *
     * @param array $arr
     * @return date
     */
    public function getUpdateAt($arr)
    {
        return $arr['update_at'];
    }
}
