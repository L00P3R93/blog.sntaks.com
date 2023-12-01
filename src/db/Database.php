<?php
namespace app\db;

use app\manager\Application;
use Exception;

class Database{
    private $host;
    private $database;
    private $user;
    private $password;

    private static $con;
    private static $instance;

    /**
     * @param $host
     * @param $dbname
     * @param $dbuser
     * @param $dbpassword
     */
    private function __construct($host, $dbname, $dbuser, $dbpassword){
        $this->host = $host;
        $this->database = $dbname;
        $this->user = $dbuser;
        $this->password = $dbpassword;

        $this->getDb();
    }

    /**
     * @return false|\mysqli|void
     */
    public function getDb(){
        if(!self::$con){
            try{
                self::$con = mysqli_connect($this->host,$this->user, $this->password, $this->database);
            }catch (Exception $th){
                die($th->getMessage());
            }
        }
        return self::$con;
    }

    /**
     * @return self
     * @throws Exception
     */
    public static function getInstance(){
        if(!self::$instance){
            $config = Application::getConfig();
            $host = $config['db']['host'];
            $database = $config['db']['database'];
            $user = $config['db']['user'];
            $password = $config['db']['password'];

            self::$instance = new self($host, $database, $user, $password);
        }

        return self::$instance;
    }

    /**
     * Closes MySQL database connection
     */
    public static function close(){mysqli_close(self::$con);}


    /**
     * Accepts a query and executes the query.
     * Returns 1 if query executes successfully otherwise it returns mysqli_error.
     * @param $q - The Query
     * @return int|void
     */
    public static function exec($q){
        return mysqli_query(self::$con, $q) ? 1 : die(mysqli_error(self::$con));
    }

    /**
     * Accepts a query and executes the query.
     * Returns the query result is execution is successful otherwise returns mysqli_error.
     * @param $q - The Query
     * @return bool|\mysqli_result|void
     */
    public static function execQ($q){
        $q = mysqli_query(self::$con, $q);
        return $q ? $q : die(mysqli_error(self::$con));
    }

    /**
     * Accepts a query, executes and returns mysqli_fetch_assoc array.
     * @param $q - The Query
     * @return string[]|null
     */
    public static function execS($q){
        return mysqli_fetch_assoc(mysqli_query(self::$con, $q));
    }

    /**
     * Accepts a table name, an array with table columns and an array with the respective values to insert.
     * Returns 1 if insert is successful otherwise returns an error.
     * @param $table - Table
     * @param $fields - Array of table fields
     * @param $values - Array of values to insert
     * @return int|void
     */
    public static function insert($table, $fields, $values){
        $fields = implode(',', $fields);
        $values = implode("','", $values);
        $values = "'$values'";
        $q = "INSERT INTO $table ($fields) VALUES ($values)";
        return self::exec($q);
    }

    /**
     * Accepts a table name, string with columns to update and the 'WHERE' condition for update.
     * Returns 1 if update is successful otherwise returns an error.
     * @param $table
     * @param $fields
     * @param $where
     * @return int|void
     */
    public static function update($table, $fields, $where){
        $q = "UPDATE $table SET $fields WHERE $where";
        return self::exec($q);
    }

    /**
     * Accepts a table name, the 'WHERE' condition for update and the column name.
     * Returns the value of the column.
     * @param $table
     * @param $where
     * @param $name
     * @return mixed|string
     */
    public static function getValue($table, $where, $name){
        $q = "SELECT $name FROM $table WHERE $where";
        $result = self::execS($q);
        if(!is_null($result) and isset($result) and array_key_exists($name, $result)){
            return $result[$name];
        }
        return null;
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
    public static function getQ($table, $where, $columns='*', $group_by=null, $order_by=null, $direction='ASC', $limit=null){
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
        return self::execQ($q);
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
    public static function get($table, $where, $columns='*', $group_by=null, $order_by=null, $direction='ASC', $limit=null){
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
        return self::execS($q);
    }

    /**
     * @param $table
     * @param $where
     * @param $order_by
     * @param string $columns
     * @return string[]|null
     */
    public static function getMax($table, $where, $order_by, $columns='*'){
        $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by DESC LIMIT 0, 1";
        return self::execS($q);
    }

    /**
     * @param $table
     * @param $where
     * @param string $column
     * @return int|mixed|string
     */
    public static function getMaxValue($table, $where, $column='uid'){
        $q = "SELECT MAX($column) AS $column FROM $table WHERE $where";
        return mysqli_num_rows(self::execQ($q)) > 0 ? self::execS($q)[$column] : 0;
    }

    /**
     * @param $table
     * @param $where
     * @return bool
     */
    public static function checkRowExists($table, $where){
        $q = "SELECT * FROM $table WHERE $where";
        $rows = mysqli_num_rows(self::execQ($q));
        return $rows > 0;
    }

    /**
     * @param $table
     * @param $where
     * @param string $columns
     * @return int
     */
    public static function countRows($table, $where, $columns='*'){
        $q = "SELECT $columns FROM $table WHERE $where";
        return mysqli_num_rows(self::execQ($q));
    }

    /**
     * @param $table
     * @param $where
     * @param $column
     * @return mixed|string
     */
    public static function sumRows($table,$where, $column){
        $q = "SELECT SUM($column) AS $column FROM $table WHERE $where";
        return self::execS($q)[$column];
    }

    /**
     * @param $content
     * @param $user_id
     * @return int|void
     */
    public static function activityLog($content){
        $fields = ['activity', 'date_created'];
        $values = ["$content", FULL_DATE];
        return self::insert('h_activity_logs', $fields, $values);
    }

    /**
     * @param $table
     * @param $where
     * @return int|void
     */
    public static function delete($table, $where){
        return self::exec("DELETE FROM $table WHERE $where");
    }
}