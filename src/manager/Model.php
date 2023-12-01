<?php
namespace app\manager;

use app\db\Database;
use ReflectionClass;
use Exception;

abstract class Model{
    protected $errors = [];
    protected $lastUpdate;
    protected $addedDate;
    protected $addedBy;

    public abstract static function tableName();

    public function validate(){
        return true;
    }

    /**
     *  Takes an array of attributes and sets corresponding properties of the object.
     * @param $attributes
     * @throws Exception
     */
    public function load($attributes){
        try {
            $safe_attributes = array_keys($this->getAttributes());
            foreach ($attributes as $attribute => $value) {
                if(!in_array($attribute, $safe_attributes)) continue;
                $this->{'set'.camelize($attribute)}($value);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Saves the object's state to the database.
     * It performs an INSERT if the record is new (isNewRecord() returns true),
     * and an UPDATE if the record already exists.
     * @return bool
     * @throws Exception
     */
    public function save(){
        if(!$this->validate()){
            Application::setFlash('danger', $this->getErrors());
            return false;
        }

        $db= Database::getInstance();

        try {
            if($this->isNewRecord()){
                $this->addedDate = FULL_DATE;
                $this->lastUpdate = FULL_DATE;
                $this->addedBy = decurl($_SESSION['mdm_']);
                $variables = $this->getAttributes();
                unset($variables['id']);
                $columns = implode(', ', array_keys($variables));
                $placeholders = array_map(static function ($column){
                    return "'$column'";
                }, array_values($variables));

                $q = sprintf("INSERT INTO %s (%s) VALUES (%s)", static::tableName(), $columns, implode(', ', $placeholders));
                $result = $db::execQ($q);
                if($result){
                    $this->id = mysqli_insert_id($db->getDb());
                }
            }else{
                $this->lastUpdate = FULL_DATE;
                $variables = $this->getAttributes();
                unset($variables['id']);
                $sets = [];
                foreach($variables as $column => $value){
                    $sets[] = "$column = '$value'";
                }
                $q = sprintf("UPDATE `%s` SET %s WHERE uid=%d", static::tableName(), implode(', ', $sets), $this->id);
                $result = $db::execQ($q);
            }
            //return $q;
            return $result? true: false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Retrieves an array of object properties (attributes) excluding the errors property.
     * @return array
     * @throws Exception
     */
    public function getAttributes(){
        $variables = [];
        try {
            $r = new ReflectionClass($this);
            foreach($r->getProperties() as $property){
                $name = $property->getName();
                $variables[$name] = $this->$name;
            }
            unset($variables['errors']);
            return $variables;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function isNewRecord(){ return is_null($this->id); }

    public function getErrors(){ return $this->errors; }
    public function getLastUpdate(){ return $this->lastUpdate; }
    public function getAddedDate(){ return $this->addedDate; }
    public function getAddedBy(){ return $this->addedBy; }

    public function setErrors($key, $value){ $this->errors[$key] = $value; }
    public function setLastUpdate($lastUpdate){ $this->lastUpdate = $lastUpdate; }
    public function setAddedDate($addedDate){ $this->addedDate = $addedDate; }
    public function setAddedBy($addedBy){ $this->addedBy = $addedBy; }
}