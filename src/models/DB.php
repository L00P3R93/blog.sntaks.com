<?php

namespace Sntaks\Models;

class DB
{
    private $conn;

    /**
     * Db constructor.
     */
    public function __construct(){
        try{
            $this->conn = mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_,_DB_NAME_) or die('Oops! Something went Wrong : '.mysqli_connect_error());
        }catch (\Exception $e){
            die('Connection Failed: '. $e->getMessage());
        }
    }

    /**
     * @return false|\mysqli
     */
    public function getConn(){return $this->conn;}

    /**
     * Accepts a query and executes the query.
     * Returns 1 if query executes successfully otherwise it returns mysqli_error.
     * @param $q - The Query
     * @return int|void
     */
    public function exec($q){
        return mysqli_query($this->conn, $q) ? 1 : die("Error: ".mysqli_error($this->conn));
    }

    /**
     * Accepts a query and executes the query.
     * Returns the query result is execution is successful otherwise returns mysqli_error.
     * @param $q - The Query
     * @return bool|\mysqli_result|void
     */
    public function execQ($q){
        return mysqli_query($this->conn, $q) ? mysqli_query($this->conn, $q) : die("Error: ".mysqli_error($this->conn));
    }

    /**
     * Accepts a query, executes and returns mysqli_fetch_assoc array.
     * @param $q - The Query
     * @return string[]|null
     */
    public function execS($q){
        return mysqli_fetch_assoc(mysqli_query($this->conn, $q));
    }

    public function execM($q){
        $qe = mysqli_query($this->conn, $q); $arr = [];
        while($a = mysqli_fetch_assoc($qe)){$arr[] = $a;}
        return $arr;
    }

    /**
     * Accepts a table name, an array with table columns and an array with the respective values to insert.
     * Returns 1 if insert is successful otherwise returns an error.
     * @param $table - Table
     * @param $fields - Array of table fields
     * @param $values - Array of values to insert
     * @return int|void
     */
    public function insert($table, $fields, $values){
        $fields = implode(',', $fields);
        $values = implode("','", $values);
        $values = "'$values'";
        $q = "INSERT INTO $table ($fields) VALUES ($values)";
        return $this->exec($q);
    }

    /**
     * Accepts a table name, string with columns to update and the 'WHERE' condition for update.
     * Returns 1 if update is successful otherwise returns an error.
     * @param $table
     * @param $fields
     * @param $where
     * @return int|void
     */
    public function update($table, $fields, $where){
        $q = "UPDATE $table SET $fields WHERE $where";
        return $this->exec($q);
    }

    /**
     * Accepts a table name, the 'WHERE' condition for update and the column name.
     * Returns the value of the column.
     * @param $table
     * @param $where
     * @param $name
     * @return mixed|string
     */
    public function get_value($table, $where, $name){
        $q = "SELECT $name FROM $table WHERE $where";
        return $this->execS($q)[$name];
    }

    /**
     * Returns the result of executed query depending on the order, group or limit.
     * @param $table
     * @param $where
     * @param string $columns
     * @param null $group_by
     * @param null $order_by
     * @param string $direction
     * @param null $limit
     * @return bool|\mysqli_result|void
     */
    public function getQ($table, $where, $columns='*', $group_by=null, $order_by=null, $direction='ASC', $limit=null){
        if(!is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction LIMIT $limit";
        elseif (!is_null($group_by) and is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by";
        elseif (is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction";
        elseif (!is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction";
        elseif(is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction LIMIT $limit";
        else
            $q = "SELECT $columns FROM $table WHERE $where";
        return $this->execQ($q);
    }

    /**
     * @param $table
     * @param $where
     * @param string $columns
     * @param null $group_by
     * @param null $order_by
     * @param string $direction
     * @param null $limit
     * @return string[]|null
     */
    public function get($table, $where, $columns='*', $group_by=null, $order_by=null, $direction='ASC', $limit=null){
        if(!is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction LIMIT $limit";
        elseif (!is_null($group_by) and is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by";
        elseif (is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction";
        elseif (!is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction";
        elseif(is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction LIMIT $limit";
        else
            $q = "SELECT $columns FROM $table WHERE $where";
        return $this->execS($q);
    }

    /**
     * @param $table
     * @param $where
     * @param $order_by
     * @param string $columns
     * @return string[]|null
     */
    public function get_max($table, $where, $order_by, $columns='*'){
        $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by DESC LIMIT 0, 1";
        return $this->execS($q);
    }

    /**
     * @param $table
     * @param $where
     * @param string $column
     * @return int|mixed|string
     */
    public function get_max_value($table, $where, $column='uid'){
        $q = "SELECT MAX($column) AS $column FROM $table WHERE $where";
        return mysqli_num_rows($this->execQ($q)) > 0 ? $this->execS($q)[$column] : 0;
    }

    /**
     * Check if a row with given parameters exists, return 1 if it does not exist and 0 otherwise
     * @param $table
     * @param $where
     * @return int
     */
    public function check_row_exists($table, $where){
        $q = "SELECT * FROM $table WHERE $where";
        $rows = mysqli_num_rows($this->execQ($q));
        return $rows > 0 ? 1 : 0;
    }

    /**
     * Returns number of rows in a table with given parameters
     * @param $table
     * @param $where
     * @param string $columns
     * @return int
     */
    public function num_rows($table, $where, $columns='*'){
        $q = "SELECT $columns FROM $table WHERE $where";
        return mysqli_num_rows($this->execQ($q));
    }

    /**
     * Returns the sum of a given column in a table
     * @param $table
     * @param $where
     * @param $column
     * @return mixed|string
     */
    public  function sum_col($table,$where, $column){
        $q = "SELECT SUM($column) AS $column FROM $table WHERE $where";
        return $this->execS($q)[$column];
    }

    /**
     * Logs any given activity
     * @param $content
     * @param $user_id
     * @return int|void
     */
    public  function log($content,$user_id){
        $fields = array('activity', 'user_id');
        $values = array("$content", "$user_id");
        return $this->insert('r_activity_logs', $fields, $values);
    }

    /**
     * Deletes row(s) with given parameters
     * @param $table
     * @param $where
     * @return int|void
     */
    public function delete($table, $where){
        return $this->exec("DELETE FROM $table WHERE $where");
    }
}