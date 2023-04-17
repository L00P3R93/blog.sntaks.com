<?php
namespace Sntaks\Models;

use DateTime;

class Util{
    const format = "Y-m-d";

    public function __construct(){}

    /**
     * Encrypts given value
     * @param $id
     * @return float|int
     */
    public function encurl($id){
        return $id * SNTAKS;
    }

    /**
     * decrypts given value
     * @param $id
     * @return float|int
     */
    public function decurl($id){
        return $id / SNTAKS;
    }

    /**
     * Checks if two values match and return given value
     * @param $value1
     * @param $value2
     * @param $return
     * @return string
     */
    public function selected($value1, $value2, $return){
        return $value1 === $value2 ? $return : "";
    }

    /**
     * Capitalizes the first letter of given string
     * @param $string
     * @return string
     */
    public function uni_name($string){
        return ucwords(strtolower($string));
    }

    /**
     * Generates encrypted password using SHA256 algorithm
     * @param $pass
     * @return string
     */
    public function passencrypt($pass){
        $oursalt = self::crazyString(32);
        $longpass = $oursalt . $pass;
        $hash = hash('SHA256', $longpass);
        return $hash . $oursalt;
    }

    /**
     * Generates a random string
     * @param $length
     * @return string
     */
    public function generateRandomString($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Generates a random String to be used as salt
     * @param $length
     * @return string
     */
    public function crazyString($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#%^*()_+-~{}[];:|.<>';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Checks if value given is empty or not
     * @param $x
     * @return int
     */
    public function input_available($x){
        return !empty(rtrim($x)) ? 1 : 0;
    }

    /**
     * Checks the length of given value
     * @param $x
     * @param $l
     * @return int
     */
    public function input_length($x, $l){
        return strlen(rtrim($x)) < $l ? 0 : 1;
    }

    /**
     * Validates phone number given
     * Ensures format is 2547XX XXX XXX
     * @param $phone
     * @return int
     */
    public function validate_phone($phone){
        return (strlen($phone) == 12 and substr($phone, 0, 3) == "254") ? 1 : 0;
    }

    /**
     * Validates a given date whether it is in format of Y-m-d
     * @param $date
     * @return int
     */
    public function validate_date($date){
        return date(self::format, strtotime($date)) == date($date) ? 1 : 0;
    }

    /**
     * Validates a given email
     * @param $email
     * @return int
     */
    public function validate_email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? 1 : 0;
    }

    /**
     * Finds the time passed from now
     * @param $time
     * @param null $end
     * @return string
     * @throws \Exception
     */
    public function time_elapsed_string($datetime, $full = false){
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    /**
     * Adds a date from the given year, month or day
     * @param $date
     * @param $year
     * @param $months
     * @param $days
     * @return false|string
     */
    public function date_add($date, $year, $months, $days){
        return date('Y-m-d', strtotime($date . " + $year years + $months months + $days days"));
    }

    /**
     * Subtracts a date from the given year, month or day
     * @param $date
     * @param $year
     * @param $months
     * @param $days
     * @return false|string
     */
    public function date_sub($date, $year, $months, $days){
        return date('Y-m-d', strtotime($date . " - $year years - $months months - $days days"));
    }

    /**
     * Validates a given file type according to search array given
     * @param $file_name
     * @param $search_array
     * @return int
     */
    public function file_type($file_name, $search_array){
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        return in_array("$ext", $search_array) ? 1 : 0;
    }

    /**
     * Uploads a file and gives the uploaded file a new encrypted name
     * @param $file_name
     * @param $temp_name
     * @param $upload_dir
     * @return int|string
     */
    public function upload_file($file_name, $temp_name, $upload_dir){
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = self::generateRandomString(10) . ".$ext";
        $file_path = $upload_dir . $new_file_name;
        return move_uploaded_file($temp_name, $file_path) ? $new_file_name : 0;
    }

    /**
     * Returns a error alert
     * @param $x
     * @return string
     */
    public function error($x){
        return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns a success alert
     * @param $x
     * @return string
     */
    public function success($x){
        return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns an info alert
     * @param $x
     * @return string
     */
    public function notice($x){
        return "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns a Warning alert
     * @param $x
     * @return string
     */
    public function warning($x){
        return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param bool $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    public function get_gravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array()){
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    /**
     * Finds whether a value is in a mulitdimensional array
     * @param $needle
     * @param $haystack
     * @param bool $strict
     * @return bool
     */
    public function in_array_r($needle, $haystack, $strict = false){
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }

    public function objectToArray($object){
        if (!is_object($object) && !is_array($object)) return $object;
        return array_map('objectToArray', (array)$object);
    }
    
    public function shortenString($string, $length = 100) {
        // Trim the string to the maximum length
        $shortString = substr($string, 0, $length);

        // Find the last space before the end of the string
        $lastSpace = strrpos($shortString, ' ');

        // If the last space was found...
        if ($lastSpace !== false) {
            // Remove everything after the last space
            $shortString = substr($shortString, 0, $lastSpace);
        }

        // Add an ellipsis to the end of the string
        $shortString .= '...';

        // Return the shortened string
        return $shortString;
    }

    public function time_elapsed_string_($datetime, $full = false) {
        $now = new DateTime;
        try {$ago = new DateTime($datetime);}
        catch (\Exception $e) {}
        $diff = $now->diff($ago);

        $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
        $string_parts = array_filter(array_map(function($k, $v) use ($diff) {
            $diff->w = 0;
            return $diff->$k ? $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '') : null;
        }, array_keys($string), $string));

        if (!$full) {
            $string_parts = array_slice($string_parts, 0, 1);
        }

        return implode(', ', $string_parts) . ' ago' ?: 'just now';
    }

    public function formatViews($views) {
        if ($views >= 1000000) {
            return round($views / 1000000, 1) . 'M Views';
        } else if ($views >= 1000) {
            return round($views / 1000, 1) . 'k Views';
        } else {
            return $views . ' Views';
        }
    }

    public function intToWord($num) {
        switch($num) {
            case 1:
                return 'one';
            case 2:
                return 'two';
            case 3:
                return 'three';
            case 4:
                return 'four';
            case 5:
                return 'five';
            case 6:
                return 'six';
            case 7:
                return 'seven';
            case 8:
                return 'eight';
            case 9:
                return 'nine';
            case 10:
                return 'ten';
            default:
                return 'Invalid input';
        }
    }

    public function genRand($min, $max, &$usedNumbers){
        $n = rand($min,$max);
        while(in_array($n, $usedNumbers)){$n = rand($min, $max);}
        $usedNumbers[] = $n;
        return $n<10?"0$n":$n;
    }

    public function setDatePublished($date){
        return date('jS M, Y', strtotime($date));
    }

    public function redirect($page){
        header("Location: $page");
        exit();
    }

    public function reload($time = 0){
        header("Refresh: $time");
    }
}