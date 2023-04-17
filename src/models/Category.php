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

    public function save(){
        if($this->category_id){
            $update_str = "name='$this->name',descr='$this->description'";
            $save = $this->db->update('categories',$update_str,"uid='$this->category_id'");
        }else{
            $fields = ['name','descr','date_added'];
            $values = [$this->name, $this->description, $this->date_added];
            $save = $this->db->insert('categories',$fields,$values);
        }
        return $save;
    }

    public function getCategories($no_of_categories=null){
        $c = $this->db->getQ('categories',"uid>0",'*', null, 'uid','ASC', $no_of_categories);
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

    public function getCategoriesWithPosts($no_of_categories=null){
        $c = $this->db->getQ('posts P INNER JOIN categories C ON P.category_id=C.uid', "P.status='1'","C.uid, C.name, COUNT(P.uid) AS posts","P.category_id","posts", "DESC", $no_of_categories);
        if(!$c) return null; $arr = [];
        while($a = mysqli_fetch_assoc($c)){$arr[] = $a;}
        return $arr;
    }

    public function getCategoryMostPosts(){
        $c = $this->db->getQ('posts P INNER JOIN categories C ON P.category_id=C.uid', "P.status='1'","C.uid, C.name, COUNT(P.uid) AS posts","P.category_id","posts", "DESC", "0,1");
        if(!$c) return null; $arr = [];
        while($a = mysqli_fetch_assoc($c)){$arr[] = $a;}
        return $arr;
    }

    public function getRecentCategories($no_of_categories=null){
        $lim = ""; if(!is_null($no_of_categories)) $lim = " LIMIT $no_of_categories";
        $sql = "SELECT C.uid, C.name, C.date_added, (SELECT COUNT(P.uid) FROM posts P WHERE P.status=1 AND P.category_id=C.uid) AS no_of_posts
                FROM categories C
                WHERE (SELECT COUNT(P.uid) FROM posts P WHERE P.status=1 AND P.category_id=C.uid) >0
                ORDER BY no_of_posts DESC, C.date_added DESC$lim";
        $c = $this->db->execQ($sql);
        if(!$c) return null; $arr = [];
        while($a = mysqli_fetch_assoc($c)){$arr[] = $a;}
        return $arr;
    }

    public function getPopularCategoriesByViews($no_of_categories=null){
        $lim = ""; if(!is_null($no_of_categories)) $lim = " LIMIT $no_of_categories";
        $sql = "SELECT C.uid, C.name, C.date_added,
                       (SELECT COUNT(P.uid) FROM posts P WHERE P.status=1 AND P.category_id=C.uid) AS no_of_posts,
                       (SELECT MAX(V.view_count) FROM post_views V INNER JOIN posts P ON V.post_id=P.uid WHERE P.category_id=C.uid) AS view_count
                FROM categories C
                WHERE (SELECT MAX(V.view_count) FROM post_views V INNER JOIN posts P ON V.post_id=P.uid WHERE P.category_id=C.uid) >0
                ORDER BY view_count DESC$lim";
        $c = $this->db->execQ($sql);
        if(!$c) return null; $arr = [];
        while($a = mysqli_fetch_assoc($c)){$arr[] = $a;}
        return $arr;
    }

    public function __toString(){
        return "Category: [id={$this->category_id}, name={$this->name}, description={$this->description}, date_added={$this->date_added}]";
    }
}