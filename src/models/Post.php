<?php
namespace Sntaks\Models;

use Faker\Factory as FakerFactory;

class Post{
    private $post_id;
    private $title;
    private $content;
    private $author;
    private $published_date;
    private $added_by;
    private $category_id;
    private $tags;
    private $status;
    private $date_added;
    private $date_modified;

    private $db;

    public function __construct(
        $post_id = null, $title = null, $content = null, $author = null, $published_date = null,
        $added_by = null, $category_id = null, $tags = null, $status = null, $date_added = null, $date_modified = null
    ) {
        $this->post_id = $post_id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->published_date = $published_date;
        $this->added_by = $added_by;
        $this->category_id = $category_id;
        $this->tags = $tags;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
        $this->db = new DB();
    }

    // Getters
    public function getPostId() {return $this->post_id;}
    public function getTitle() {return $this->title;}
    public function getContent() {return $this->content;}
    public function getAuthor() {return $this->author;}
    public function getPublishedDate() {return $this->published_date;}
    public function getAddedBy() {return $this->added_by;}
    public function getCategoryId() {return $this->category_id;}
    public function getTags() {return $this->tags;}
    public function getStatus() {return $this->status;}
    public function getDateAdded() {return $this->date_added;}
    public function getDateModified() {return $this->date_modified;}

    // Setters
    public function setPostId($post_id) {$this->post_id = $post_id;}
    public function setTitle($title) {$this->title = $title;}
    public function setContent($content) {$this->content = $content;}
    public function setAuthor($author) {$this->author = $author;}
    public function setPublishedDate($published_date) {$this->published_date = $published_date;}
    public function setAddedBy($added_by) {$this->added_by = $added_by;}
    public function setCategoryId($category_id) {$this->category_id = $category_id;}
    public function setTags($tags) {$this->tags = $tags;}
    public function setStatus($status) {$this->status = $status;}
    public function setDateAdded($date_added) {$this->date_added = $date_added;}
    public function setDateModified($date_modified) {$this->date_modified = $date_modified;}

    public function checkDBconn(){
        if($this->db){return "Connected";}
        else{return "Connection Failed";}
    }

    public function save(){
        if($this->post_id){
            $update_str = "title='$this->title',content='$this->content',author='$this->author',published_date='$this->published_date',user_id='$this->added_by',category_id='$this->category_id',tags='$this->tags',status='$this->status',date_modified='".FULL_DATE."'";
            $save = $this->db->update('users',$update_str,"uid='$this->post_id'");
        }else{
            $fields = ['title','content','author','published_date','added_by','category_id','tags','status','date_added'];
            $values = [$this->title, $this->content, $this->author, $this->published_date, $this->added_by, $this->category_id, $this->tags, $this->status, $this->date_added];
            $save = $this->db->insert('posts',$fields,$values);
        }
        return $save;
    }

    /**
     * Returns an array of all posts with the specified status
     * @param $state
     * @return array|null
     */
    public function getPosts($state){
        $p = $this->db->getQ('posts', "status='$state'");
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    /**
     * Returns a Post object of the post with specified post ID
     * @param $post_id
     * @return Post|null
     */
    public function getPostById($post_id){
        $p = $this->db->get('posts',"uid='$post_id'");
        //return $u;
        if(count($p) <= 0) return null;
        return new Post($p['uid'],$p['title'],$p['content'],$p['author'],$p['pubished_date'],$p['added_by'],$p['category_id'],$p['tags'],$p['status'],$p['date_added'],$p['date_modified']);
    }

    public function getPostByAddedBy($user_id){
        $p = $this->db->getQ('posts', "added_by='$user_id'");
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getPostByCategoryId($category_id){
        $p = $this->db->getQ('posts', "category_id='$category_id'");
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getPostsGroupedByCategory(){
        $p = $this->db->getQ('posts P INNER JOIN categories C ON P.category_id=C.uid', "P.status='1'","C.uid, C.name, COUNT(P.uid) AS posts","P.category_id","P.category_id");
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function __toString() {
        return "Post: [id={$this->post_id}, title={$this->title}, content={$this->content}, author={$this->author}, published_date={$this->published_date}, user_id={$this->added_by}, category_id={$this->category_id}, tags={$this->tags}, status={$this->status}, date_added={$this->date_added}, date_modified={$this->date_modified}]";
    }

    public function generateFakePosts($count) {
        $faker = FakerFactory::create();

        for ($i = 0; $i < $count; $i++) {
            $title = $faker->sentence(6);
            $content = mysqli_real_escape_string($this->db->getConn(), $faker->paragraphs(4, true)) ;
            $author = $faker->name();
            $published_date = $faker->dateTimeBetween('-2 years', 'now', 'Africa/Nairobi')->format('Y-m-d H:i:s');
            $user_id = $faker->numberBetween(1, 2);
            $category_id = $faker->numberBetween(1, 16);

            $tags = implode(',', array_map(function() use ($faker) { return $faker->numberBetween(1, 20); }, range(1, $faker->numberBetween(1, 5))));
            $status = $faker->numberBetween(1, 7);
            $date_added = date('Y-m-d H:i:s');

            $p = new Post(null, $title,$content,$author,$published_date, $user_id,$category_id,$tags,$status,$date_added);
            //echo $p."<br>";
            $insert = $p->save();
            echo $insert;
        }
    }

}