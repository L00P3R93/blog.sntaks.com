<?php

namespace app\models;

use app\db\Database;
use app\manager\Model;
use app\models\Post;

class Category extends Model{
    protected $id;
    protected $name;
    protected $descr;
    protected $status;

    public static function tableName(){
        return 'categories';
    }

    public function validate(){
        return empty($this->getErrors());
    }

    public function __construct($id=null){
        if($id){
            $this->id = $id;
        }
    }

    public function getCategories($query="uid>0", $orderBy="uid", $direction="DESC", $limit=10){
        $categories = [];
        $db = Database::getInstance();
        $q = $db::getQ(static::tableName(), $query, "*", null, $orderBy, $direction, $limit);
        while($r = mysqli_fetch_assoc($q)){
            $categories[] = $r;
        }
        return $categories;
    }

    public function getCategoryDetails($categoryId){
        $id = is_null($categoryId) ? $this->id : $categoryId;
        $db = Database::getInstance();
        return $db::get(static::tableName(), "id=$id");
    }

    public function getCategoryPosts($categoryId){
        $p = new Post();
        return $p->getPosts("categoryId=$categoryId");
    }

    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id; }

    public function getName(){ return $this->name; }
    public function setName($name){ $this->name = $name; }

    public function getDescr(){ return $this->descr; }
    public function setDescr($descr){ $this->descr = $descr; }

    public function getStatus(){ return $this->status; }
    public function setStatus($status){ $this->status = $status; }
}