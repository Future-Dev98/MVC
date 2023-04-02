<?php

namespace Model;

use Api\CategoryInterface;
use Model\Database;

class Category implements CategoryInterface {

    /**
     * Database
     *
     * @var Database
     */
    protected $database;

    /**
     * @param Database $database
     */
    public function __construct()
    {
        $this->database = new Database();
    }

    /**
     * get category list
     *
     * @return array
     */
    public function getCategories()
    {
        $conn = $this->database->ConnectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'SELECT * FROM category';
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
    public function getCategoiesByPostId($postId)
    {
        $conn = $this->database->ConnectDB();

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'SELECT * FROM categories JOIN category_posts ON categories.entity_id = category_posts.entity_id WHERE post_id = '.$postId.'';
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
        return $arr['category_status'];
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
