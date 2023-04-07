<?php
namespace Sntaks\Models;


class User {
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $status;
    private $date_added;
    private $db;


    public function __construct($user_id=null,$username=null,$email=null,$password=null,$role=null,$status=null,$date_added=null){
        $this->user_id = $user_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->db = new DB();
    }

    /**
     * Getters
     */
    public function getUserId(){return $this->user_id;}
    public function getUsername(){return $this->username;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}
    public function getRole(){return $this->role;}
    public function getStatus(){return $this->status;}
    public function getDateAdded(){return $this->date_added;}

    /**
     * Setters
     */
    /**
     * @param null $user_id
     */
    public function setUserId($user_id){$this->user_id = $user_id;}
    public function setUsername($username){$this->username = $username;}
    public function setEmail($email){$this->email = $email;}
    public function setPassword($password){$this->password = $password;}
    public function setRole($role){$this->role = $role;}
    public function setStatus($status){$this->status = $status;}
    public function setDateAdded($date_added){$this->date_added = $date_added;}

    public function checkDBconn(){
        if($this->db){return "Connected";}
        else{return "Connection Failed";}
    }

    public function save(){
        if($this->user_id){
            $update_string = "username='$this->username',email='$this->email',password='$this->password',role='$this->role',status='$this->status'";
            $save = $this->db->update('users',$update_string,"uid='$this->user_id'");
        }else{
            $fields = ['username','email','password','role','status','date_added'];
            $values = [$this->username, $this->email, $this->password, $this->role, $this->status, FULL_DATE];
            $save = $this->db->insert('users',$fields,$values);
        }

        return $save;
    }

    public function getUsers($state){
        $u = $this->db->getQ('users',"status='$state'");
        if(!$u) return null; $arr = [];
        while($a = mysqli_fetch_assoc($u)){$arr[] = $a;}
        return $arr;
    }

    /**
     * @param $user_id
     * @return User|null
     */
    public function getUserById($user_id){
        $u = $this->db->get('users',"uid='$user_id'");
        //return $u;
        if(count($u) <= 0) return null;
        return new User($u['uid'], $u['username'], $u['email'], $u['password'], $u['role'], $u['status'], $u['date_added']);
    }

    /**
     * @param $username
     * @return User|null
     */
    public function getUserByUsername($username){
        $user = (new DB)->get('users',"username='$username'");
        if(count($user) <= 0) return null;
        return new User($user['uid'], $user['username'], $user['email'], $user['password'], $user['role'], $user['status'], $user['date_added']);
    }

    /**
     * @param $email
     * @return User|null
     */
    public function getUserByEmail($email){
        $user = (new DB)->get('users',"email='$email'");
        if(count($user) <= 0) return null;
        return new User($user['uid'], $user['username'], $user['email'], $user['password'], $user['role'], $user['status'], $user['date_added']);
    }

    /**
     * Returns the user role name given the user id
     * @param $user_id
     * @return mixed|string
     */
    public function getRoleByUserId($user_id){
        return $this->db->get_value("users U INNER JOIN roles R on U.role=R.uid","U.uid='$user_id'","R.name");
    }

    /**
     * Returns the user status name given the user id
     * @param $user_id
     * @return mixed|string
     */
    public function getStatusName($user_id){
        return $this->db->get_value("users U INNER JOIN user_status S on U.status=S.uid","U.uid='$user_id'","S.name");
    }

    public function getUserPosts($user_id){
        $p = $this->db->getQ('posts', "added_by='$user_id'");
        if(!$p) return null; $arr = [];
        while($a = mysqli_fetch_assoc($p)){$arr[] = $a;}
        return $arr;
    }

    public function __toString() {
        return "User: [id={$this->user_id}, username={$this->username}, email={$this->email}, password={$this->password}, role={$this->role}, status={$this->status}, date_added={$this->date_added}]";
    }


}