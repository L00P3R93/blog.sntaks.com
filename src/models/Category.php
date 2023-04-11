<?php
namespace Sntaks\Models;

class Category{
    private $category_id;
    private $name;
    private $description;
    private $date_added;
    private $db;

    public function __construct($category_id=null,$name=null,$description=null,$date_added=null){
        $this->category_id = $category_id;
        $this->name = $name;
        $this->description = $description;
        $this->date_added = $date_added;
        $this->db = new DB();
    }

    //Getters
    public function getCategoryId(){return $this->category_id;}
    public function getName(){return $this->name;}
    public function getDescription(){return $this->description;}
    public function getDateAdded(){return $this->date_added;}

    //Setters
    public function setCategoryId($category_id){$this->category_id = $category_id;}
    public function setName($name){$this->name = $name;}
    public function setDescription($description){$this->description = $description;}
    public function setDateAdded($date_added){$this->date_added = $date_added;}

    public function getCategories(){
        $c = $this->db->getQ('categories',"uid>0");
        if(!$c) return null; $arr = [];
        while($a = mysqli_fetch_assoc($c)){$arr[] = $a;}
        return $arr;
    }

    public function getCategoryById($category_id){
        $c = $this->db->get('categories',"uid='$category_id'");
        //return $u;
        if(count($c) <= 0) return null;
        return new Category($c['uid'], $c['name'], $c['descr'], $c['date_added']);
    }

    public function getCategoriesWithPosts(){
        $c = $this->db->getQ('posts P INNER JOIN categories C ON P.category_id=C.uid', "P.status='1'","C.uid, C.name, COUNT(P.uid) AS posts","P.category_id","posts", "DESC");
        if(!$c) return null; $arr = [];
        while($a = mysqli_fetch_assoc($c)){$arr[] = $a;}
        return $arr;
    }

    public function __toString(){
        return "User: [id={$this->category_id}, name={$this->name}, description={$this->description}, date_added={$this->date_added}]";
    }
}