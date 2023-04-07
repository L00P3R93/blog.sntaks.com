<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
error_reporting(E_ALL);

use Sntaks\Models\DB;
use Sntaks\Models\User;
use Sntaks\Models\Post;

use Sntaks\Models\Router;

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

$router = new Router();

// Define the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/{id:\d+}', ['controller' => 'Posts', 'action' => 'show']);

// Match the current URL
$url = $_SERVER['QUERY_STRING'];
if ($router->match($url)) {
    $controller = $router->getParams()['controller'];
    $action = $router->getParams()['action'];

    // Call the appropriate controller and action
    $controllerName = $controller . 'Controller';
    $controllerFile = 'controllers/' . $controllerName . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controllerObj = new $controllerName();
        $controllerObj->$action();
    } else {
        // Handle 404 error
    }
} else {
    // Handle 404 error
}


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


$DB = new DB();
$user = new User();
$post = new Post();

echo "DB State => ".$user->checkDBconn();
echo "<br>";
var_export($user->getUsers(1));

$_SESSION['sntaks_'] = 1;
if(isset($_SESSION['sntaks_'])){
    $user_id = $_SESSION['sntaks_'];
    $user = $user->getUserById($user_id);
    echo "<br>Username: ".$user->getUsername();
}

echo "<br>";
//$post->generateFakePosts(7);
$p = $post->getPostsGroupedByCategory();
var_export($p);

