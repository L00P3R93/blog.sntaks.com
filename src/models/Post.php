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
    private $status;
    private $date_added;
    private $date_modified;

    private $views_count;

    private $db;

    public function __construct(
        $post_id = null, $title = null, $content = null, $author = null, $published_date = null,
        $added_by = null, $category_id = null, $status = null, $date_added = null, $date_modified = null, $views_count=null
    ) {
        $this->post_id = $post_id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->published_date = $published_date;
        $this->added_by = $added_by;
        $this->category_id = $category_id;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
        $this->views_count = $views_count;

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
    public function getStatus() {return $this->status;}
    public function getDateAdded() {return $this->date_added;}
    public function getDateModified() {return $this->date_modified;}
    public function getViewsCount(){return $this->views_count;}

    // Setters
    public function setPostId($post_id) {$this->post_id = $post_id;}
    public function setTitle($title) {$this->title = $title;}
    public function setContent($content) {$this->content = $content;}
    public function setAuthor($author) {$this->author = $author;}
    public function setPublishedDate($published_date) {$this->published_date = $published_date;}
    public function setAddedBy($added_by) {$this->added_by = $added_by;}
    public function setCategoryId($category_id) {$this->category_id = $category_id;}
    public function setStatus($status) {$this->status = $status;}
    public function setDateAdded($date_added) {$this->date_added = $date_added;}
    public function setDateModified($date_modified) {$this->date_modified = $date_modified;}
    public function setViewsCount($views_count){$this->views_count = $views_count;}

    public function checkDBconn(){
        if($this->db){return "Connected";}
        else{return "Connection Failed";}
    }

    public function save(){
        if($this->post_id){
            $update_str = "title='$this->title',content='$this->content',author='$this->author',published_date='$this->published_date',user_id='$this->added_by',category_id='$this->category_id',status='$this->status',date_modified='".FULL_DATE."'";
            $save = $this->db->update('users',$update_str,"uid='$this->post_id'");
        }else{
            $fields = ['title','content','author','published_date','added_by','category_id','status','date_added'];
            $values = [$this->title, $this->content, $this->author, $this->published_date, $this->added_by, $this->category_id, $this->status, $this->date_added];
            $save = $this->db->insert('posts',$fields,$values);
        }
        return $save;
    }

    /**
     * Returns an array of all posts with the specified status
     * @param $state
     * @param null $no_of_posts
     * @return array|null
     */
    public function getPosts($state, $no_of_posts=null){
        $p = $this->db->getQ('posts', "status='$state'",'*',null, 'uid', 'ASC', $no_of_posts);
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
        $views_count = $this->getPostViews($p['uid']);
        return new Post($p['uid'],$p['title'],$p['content'],$p['author'],$p['published_date'],$p['added_by'],$p['category_id'],$p['status'],$p['date_added'],$p['date_modified'],$views_count);
    }

    public function getPostCategoryName(){

    }

    public function getPostByAddedBy($user_id){
        $p = $this->db->getQ('posts', "added_by='$user_id'");
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getPostByCategoryId($category_id, $no_of_posts=null){
        $p = $this->db->getQ('posts', "category_id='$category_id'",'*',null,'uid','DESC',$no_of_posts);
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getPostsGroupedByCategory($no_of_categories=null){
        $p = $this->db->getQ('posts P INNER JOIN categories C ON P.category_id=C.uid', "P.status='1'","C.uid, C.name, COUNT(P.uid) AS posts","P.category_id","posts",'DESC',$no_of_categories);
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getMostViewedPosts($no_of_posts=null){
        $p = $this->db->getQ('posts P INNER JOIN post_views V on P.uid = V.post_id',"status='1'",'P.*,V.view_count,V.last_viewed',null,'V.view_count','DESC',$no_of_posts);
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getRandomPosts($no_of_posts="0,4"){
        $p = $this->db->getRandWithLimit('posts',"status='1'", $no_of_posts);
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getPopularPostByView(){
        $p = $this->db->get('posts P INNER JOIN post_views V on P.uid = V.post_id',"status='1'",'P.*,V.view_count,V.last_viewed',null,'V.view_count','DESC','0,1');
        //return $u;
        if(count($p) <= 0) return null;
        return new Post($p['uid'],$p['title'],$p['content'],$p['author'],$p['published_date'],$p['added_by'],$p['category_id'],$p['status'],$p['date_added'],$p['date_modified'],$p['view_count']);
    }

    public function getPostViews($post_id){
        $p = $this->db->get('post_views',"post_id='$post_id'");
        //return $u;
        //if(count($p) <= 0 or !$p) return null;
        return (isset($p['view_count']) and !empty($p['view_count']) and $p['view_count'])? $p['view_count']: 0;
    }

    public function getPostTags($post_id){
        $p = $this->db->getQ('posts P INNER JOIN post_tags PT ON PT.post_id=P.uid INNER JOIN tags T ON PT.tag_id=T.uid',"P.uid='$post_id'",'T.uid,T.name',null,'T.uid');
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function getRelatedPosts($tagIdStr, $no_of_posts="5"){
        $p = $this->db->getQ('posts P INNER JOIN post_tags PT ON PT.post_id=P.uid',"PT.tag_id IN (".$tagIdStr.")",'P.*',null,'P.uid',"ASC", $no_of_posts);
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function __toString() {
        return "Post: [id={$this->post_id}, title={$this->title}, content={$this->content}, author={$this->author}, published_date={$this->published_date}, user_id={$this->added_by}, category_id={$this->category_id}, status={$this->status}, date_added={$this->date_added}, date_modified={$this->date_modified}, view_count={$this->views_count}]";
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
            $status = 1 /*$faker->numberBetween(1, 7)*/;
            $date_added = date('Y-m-d H:i:s');

            $p = new Post(null, $title,$content,$author,$published_date, $user_id,$category_id,$status,$date_added);
            //echo $p."<br>";
            $insert = $p->save();
            echo $insert;
            sleep(2);
        }
    }

}