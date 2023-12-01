<?php

namespace app\models;

use app\db\Database;
use app\manager\Model;

class Role extends Model{
    protected $id;
    protected $name;
    protected $status;

    public static function tableName(){
        return 'roles';
    }

    /**
     * A constructor for the PHP class.
     *
     * @param mixed $id The optional ID parameter.
     */
    public function __construct($id=null){
        if($id){
            $this->id = $id;
        }
    }

    /**
     * Validates the function.
     *
     * @return bool Returns true if validation is successful, false otherwise.
     */
    public function validate(){
        if(empty($this->name)){
            $this->setErrors('Name', 'Invalid Role Name');
        }

        return empty($this->getErrors());
    }

    /**
     * Retrieves the roles based on the provided query and orders them by the specified column in the specified direction.
     *
     * @param string $query The query to filter the roles. Default is "uid>0".
     * @param string $orderBy The column to order the roles by. Default is "uid".
     * @param string $direction The direction to order the roles in. Default is "DESC".
     * @throws Some_Exception_Class Exception thrown if there is an error retrieving the roles.
     * @return array Returns an array of roles.
     */
    public function getRoles($query="uid>0", $orderBy="uid", $direction="DESC"){
        $roles = [];
        $db = Database::getInstance();
        $q = $db::getQ(static::tableName(), $query, "*", null, $orderBy, $direction);
        while($r = mysqli_fetch_assoc($q)){
            $roles = $r;
        }
        return $roles;
    }

    /**
     * Retrieves the role details based on the provided role ID.
     *
     * @param int|null $roleId The ID of the role to retrieve details for. If null, the ID of the current object is used.
     * @throws Some_Exception_Class A description of the exception that may be thrown.
     * @return Some_Return_Value The details of the role.
     */
    public function getRoleDetails($roleId){
        $id = is_null($roleId) ? $this->id : $roleId;
        $db = Database::getInstance();
        return $db::get(static::tableName(), "uid = $id");
    }

    /**
     * Retrieves the role name based on the given role ID.
     *
     * @param int $roleId The ID of the role.
     * @return string The name of the role, or "No Role" if not found.
     */
    public function getRoleName($roleId=null){
        $id = is_null($roleId) ? $this->id : $roleId;
        $roleName = $this->getRoleDetails($id)['name'];
        return !empty($roleName)? $roleName: "No Role";
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}