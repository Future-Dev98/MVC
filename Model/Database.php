<?php
namespace Model;

class Database {

    protected $db_name = DB_NAME;
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;

    public function __construct()
    {
        $this->db_name = DB_NAME;
        $this->db_host = DB_HOST;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASS;
        $this->CreatePostsTable();
        $this->CreateCategoriesTable();
        $this->CreateCategoryPostsTable();
    }
    
    /**
     * Connect database
     *
     */
    public function ConnectDB()
    {
        // Create connection
        $conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $conn;
        }
    }

    /**
     * Create Posts table
     *
     */
    public function CreatePostsTable()
    {
        $conn = $this->ConnectDB();
        $sqlSelect = 'SELECT * FROM posts';
        $resultSelect = $conn->query($sqlSelect);
        $sqlCreate = 'CREATE TABLE posts (
            entity_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            content VARCHAR(2000),
            thumbnail_image VARCHAR(100),
            url_key VARCHAR(100) UNSIGNED,
            post_status SMALLINT(1) DEFAULT "1",
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (entity_id),
        )';
        if (!$resultSelect) {
            $conn->query($sqlCreate);
        }
    }

    /**
     * Create Categories table
     *
     */
    public function CreateCategoriesTable()
    {
        $conn = $this->ConnectDB();
        $sqlSelect = 'SELECT * FROM categories';
        $resultSelect = $conn->query($sqlSelect);
        $sqlCreate = 'CREATE TABLE categories (
            entity_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            content VARCHAR(2000),
            thumbnail_image VARCHAR(100),
            url_key VARCHAR(100) UNSIGNED,
            category_status SMALLINT(1) DEFAULT "1",
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (entity_id),
        )';
        if (!$resultSelect) {
            $conn->query($sqlCreate);
        }
    }

    /**
     * Create Category posts table
     *
     */
    public function CreateCategoryPostsTable()
    {
        $conn = $this->ConnectDB();
        $sqlSelect = 'SELECT * FROM category_posts';
        $resultSelect = $conn->query($sqlSelect);
        $sqlCreate = 'CREATE TABLE category_posts (
            entity_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            category_id INT(6) NOT NULL,
            post_id INT(6) NOT NULL,
            PRIMARY KEY (entity_id),
            FOREIGN KEY (category_id) REFERENCES categories(entity_id),
            FOREIGN KEY (post_id) REFERENCES posts(entity_id)
        )';
        if (!$resultSelect) {
            $conn->query($sqlCreate);
        }
    }
}