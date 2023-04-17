<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
error_reporting(E_ALL);

use Sntaks\Models\DB;
use Sntaks\Models\User;
use Sntaks\Models\Post;
use Sntaks\Models\Category;

use Sntaks\Models\Util;

require 'vendor/autoload.php';

$config = array(
    'database_name'=>'sntaks_blog',
    'database_host'=>'localhost',
    /*'database_user'=>'sterling_user',
    'database_password'=>'prZ~1SnCk!Y-',*/
    'database_user'=>'root',
    'database_password'=>'',
    'cors'=>[
        'enabled'=>true,
        'origin'=>'*',
        'headers'=>[
            'Access-Control-Allow-Headers'=>'Origin, X-Requested-With, Authorization, Cache-Control, Content-Type, Access-Control-Allow-Origin',
            'Access-Control-Allow-Credentials'=>'true',
            'Access-Control-Allow-Methods'=>'GET,PUT,POST,DELETE,OPTIONS,PATCH'
        ]
    ]
);

$pages = array("login", "dashboard", "staff", "expenses", "payroll");
$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$p = explode('/', $url);
$page = end($p);

define('_DB_SERVER_', $config['database_host']);
define('_DB_NAME_', $config['database_name']);
define('_DB_USER_', $config['database_user']);
define('_DB_PASSWD_', $config['database_password']);
define('SNTAKS', 1192);
define('ADMIN_MAIL', 'info@sntaks.com');
define('FULL_DATE', date('Y-m-d H:i:s'));
define('NOW_', date('Y-m-d H:i:s'));
define('DATE_', date('Y-m-d'));
define('YEAR_', date('Y'));
define('MONTH_', date('m'));
define('DAY_', date('d'));


$db = new DB();
$user = new User();
$post = new Post();
$category = new Category();
$util = new Util();

//echo "DB State => ".$user->checkDBconn()."<br>";

$_SESSION['sntaks_'] = 2;
$username = $user_email = '';
if(isset($_SESSION['sntaks_'])){
    $user_id = $_SESSION['sntaks_'];
    $user = $user->getUserById($user_id);
    $username = $user->getUsername();
    $user_email = $user->getEmail();
}

/**
 * Categories
 */
$all_categories = $category->getCategories();
$categories_with_posts = $category->getCategoriesWithPosts("0,4");
$category_most_posts = $category->getCategoryMostPosts();
$recent_categories = $category->getRecentCategories("0,4");
$category_viewed = $category->getPopularCategoriesByViews("0,4");

/**
 * Posts
 */
$all_posts = $post->getPosts(1);
$post_viewed = $post->getPopularPostByView();
$viewed_posts = $post->getMostViewedPosts("0,4");
$random_posts = $post->getRandomPosts();

echo "<br>";
$post_view = new Post();
$post_tags = [];

if(isset($_GET['pid']) and !empty($_GET['pid'])){
    //$post_id_ = $util->decurl($_GET['pid']);
    $post_id_ = $_GET['pid'];
    if($post_id_ > 0){
        $post_view = $post->getPostById($post_id_);
        $post_tags = $post->getPostTags($post_id_);
        $tagsIdArr = array_map(function($item) {return $item['uid'];}, $post_tags);
        $tagsIdStr = implode(',', $tagsIdArr);
        $post_related = $post->getRelatedPosts($tagsIdStr);

    }else{
        $util->redirect('home');
    }
}

var_export($post_related);


