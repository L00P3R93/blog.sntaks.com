<?php

namespace app\models;

use app\db\Database;
use app\manager\Model;

class Post extends Model{
    protected $id;
    protected $title;
    protected $content;
    protected $author;
    protected $publishedDate;
    protected $addedBy;
    protected $categoryId;
    protected $status;

    /**
     * Returns the name of the table.
     *
     * @return string The name of the table.
     */
    public static function tableName(){
        return 'posts';
    }

    public function validate(){
        return empty($this->getErrors());
    }

    /**
     * Retrieves posts from the database based on the given query.
     *
     * @param string $query The query used to filter the posts. Default is "uid>0".
     * @param string $orderBy The field used to order the posts. Default is "uid".
     * @param string $direction The direction of the ordering. Default is "DESC".
     * @return array The array of posts retrieved from the database.
     */
    public function getPosts($query="uid>0", $orderBy="uid", $direction="DESC"){
        $posts = [];
        $db = Database::getInstance();
        $q = $db::getQ(static::tableName(), $query, "*", null, $orderBy, $direction, "1000");
        while($r = mysqli_fetch_assoc($q)){
            $posts[] = $r;
        }
        return $posts;
    }

    /**
     * Retrieves the details of a post.
     *
     * @param int|null $postId The ID of the post. If null, the ID of the current object will be used.
     * @throws Some_Exception_Class A description of the exception that may be thrown.
     * @return Some_Return_Value The details of the post.
     */
    public function getPostDetails($postId=null){
        $id = is_null($postId) ? $this->id : $postId;
        $db = Database::getInstance();
        return $db::get(static::tableName(), "id=$id");
    }

    /**
     * Retrieves the number of views for a specific post.
     *
     * @param int $postId The ID of the post to retrieve the views for.
     * @throws Some_Exception_Class If there is an error retrieving the views.
     * @return int The number of views for the post.
     */
    public function getPostViews($postId){
        $id = is_null($postId) ? $this->id : $postId;
        $db = Database::getInstance();
        return $db::getValue('post_views', "postId=$id", "views");
    }


    /**
     * Retrieves the number of likes for a specific post.
     *
     * @param int $postId The ID of the post. If null, the method will use the ID of the current instance.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return int The number of likes for the specified post.
     */
    public function getPostLikes($postId){
        $id = is_null($postId) ? $this->id : $postId;
        $db = Database::getInstance();
        return $db::countRows('post_likes', "postId=$id");
    }

    /**
     * Retrieves the images associated with a post.
     *
     * @param int $postId The ID of the post to retrieve images for.
     * @return array An array of post images.
     */
    public function getPostImg($postId){
        $postImgs = [];
        $id = is_null($postId) ? $this->id : $postId;
        $db = Database::getInstance();
        $q = $db::getQ('post_img', "postId=$id");
        while($pi = mysqli_fetch_assoc($q)){
            $postImgs[] = $pi;
        }
        return $postImgs;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getContent() { return $this->content; }
    public function setContent($content) { $this->content = $content; }

    public function getAuthor() { return $this->author; }
    public function setAuthor($author) { $this->author = $author; }

    public function getPublishedDate() { return $this->publishedDate; }
    public function setPublishedDate($publishedDate) { $this->publishedDate = $publishedDate; }

    public function getAddedBy() { return $this->addedBy; }
    public function setAddedBy($addedBy) { $this->addedBy = $addedBy; }

    public function getCategoryId() { return $this->categoryId; }
    public function setCategoryId($categoryId) { $this->categoryId = $categoryId; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}