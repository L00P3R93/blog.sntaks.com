<?php
namespace Sntaks\Models;


class Tags{
    private $tag_id;
    private $name;
    private $date_added;
    private $db;

    public function __construct($tag_id, $name, $date_added) {
        $this->tag_id = $tag_id;
        $this->name = $name;
        $this->date_added = $date_added;
        $this->db = new DB();
    }

    public function getTagId() {return $this->tag_id;}
    public function getTagName() {return $this->name;}
    public function getDateAdded() {return $this->date_added;}

    public function setTagId($tag_id) {$this->tag_id = $tag_id;}
    public function setTagName($name) {$this->name = $name;}
    public function setDateAdded($date_added) {$this->date_added = $date_added;}

    public function save(){
        if($this->tag_id){
            $update_str = "name='$this->name'";
            $save = $this->db->update('tags',$update_str,"uid='$this->tag_id'");
        }else{
            $fields = ['name','date_added'];
            $values = [$this->name, $this->date_added];
            $save = $this->db->insert('tags',$fields,$values);
        }
        return $save;
    }

    public function __toString(){
        return "Tag: [id={$this->tag_id}, name={$this->name}, date_added={$this->date_added}]";
    }

}