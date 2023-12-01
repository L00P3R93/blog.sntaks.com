<?php

namespace app\models;
use app\db\Database;
use app\manager\Model;
use app\models\Role;
use app\models\Post;

class User extends Model{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $status;

    
    /**
     * Returns the name of the table associated with this model class.
     *
     * @throws Some_Exception_Class description of exception
     * @return string The name of the table associated with this model class.
     */
    public static function tableName(){
        return 'users';
    }

    /**
     * Constructs a new instance of the class.
     *
     * @param mixed $id The ID of the object (optional).
     * @return void
     */
    public function __construct($id=null){
        if($id){
            $this->id = $id;
        }
    }

    /**
     * Validates the input of the function.
     *
     * @throws Some_Exception_Class If the username is empty or the email is invalid or the password is empty.
     * @return bool Returns true if the input is valid, false otherwise.
     */
    public function validate(){
        if(empty($this->username)){
            $this->setErrors('Username', 'Invalid Username');
        }

        if(!isValidEmail($this->email)){
            $this->setErrors('Email', 'Invalid Email');
        }

        if(empty($this->password)){
            $this->setErrors('Password', 'Invalid Password');
        }

        return empty($this->getErrors());
    }

    /**
     * Retrieves users from the database based on a given query.
     *
     * @param string $query The query used to filter the users. Defaults to "uid > 0".
     * @param string $orderBy The column used to order the results. Defaults to 'uid'.
     * @param string $direction The direction used to order the results. Defaults to 'DESC'.
     * @throws Some_Exception_Class A description of the exception that can be thrown.
     * @return array The array of users retrieved from the database.
     */
    public function getUsers($query = "uid > 0", $orderBy='uid', $direction='DESC'){
        $users = [];
        $db = Database::getInstance();
        $q = $db::getQ(static::tableName(), $query, "*", null, $orderBy, $direction);
        while($u = mysqli_fetch_assoc($q)){
            $loans[] = $u;
        }
        return $loans;
    }

    /**
     * Retrieves the details of a user.
     *
     * @param int|null $userId The ID of the user to retrieve details for. If null, the ID of the current user will be used.
     * @throws Some_Exception_Class Description of the exception that may be thrown.
     * @return mixed The user details.
     */
    public function getUserDetails($userId=null){
        $id = is_null($userId) ? $this->id : $userId;
        $db = Database::getInstance();
        return $db::get(static::tableName(), "uid = $id");
    }

    /**
     * Retrieves the name of a role based on its ID.
     *
     * @param int $roleId The ID of the role.
     * @throws Exception If the role name cannot be retrieved.
     * @return string The name of the role.
     */
    public function getRoleName($roleId){
        $r = new Role($roleId);
        return $r->getRoleName();
    }

    /**
     * Retrieves the posts of a user.
     *
     * @param mixed $userId The ID of the user whose posts are to be retrieved. If null, the posts of the current user are retrieved.
     * @return array The array of posts.
     */
    public function getUserPosts($userId=null){
        $posts = [];
        $id = is_null($userId) ? $this->id : $userId;
        $p = new Post();
        return $p->getPosts("addedBy='$id'");
    }

    /**
     * Retrieves user posts by category.
     *
     * @param int $categoryId The ID of the category.
     * @param int|null $userId (optional) The ID of the user. Defaults to null.
     * @return array The array of user posts.
     */
    public function getUserPostsByCategory($categoryId, $userId=null){
        $posts = [];
        $id = is_null($userId) ? $this->id : $userId;
        $p = new Post();
        return $p->getPosts("addedBy='$id' AND categoryId='$categoryId'");
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getRole() { return $this->role; }
    public function setRole($role) { $this->role = $role; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}