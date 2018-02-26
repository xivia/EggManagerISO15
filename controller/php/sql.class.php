<?php

/*
 * Doesnt work so...
 * 
  $dbHost = "sql11.freesqldatabase.com";
  $dbName = "sql11210356";
  $dbUser = "sql11210356";
  $dbPass = "AEwLKpvY4Y";
  $dbPort = "3306"; */

class SQL {

    private $sql;

    function __construct() {
        $this->sql = mysqli_connect("sql11.freesqldatabase.com", SQL::getTable(), "BymJvW5yrp", SQL::getTable());
        if (!$this->sql) {
            die("Connection failed: " . mysqli_connect_error() . "----" . mysqli_connect_errno());
        }
    }

    function __destruct() {
        mysqli_close($this->sql);
    }

    public static function getTable() {
        return "sql11223303";//passssssst numeno a eim ort
    }

    /**
     * @description mysql query function
     * @param String $q the mysql InnoDB query as String
     * @return type boolean || array
     */
    function query(String $q) {
        $r = mysqli_query($this->sql, $q);
        if (strpos(strtolower($q), "insert") !== false) {
            //return mysqli_query($this->sql, "SELECT LAST_INSERT_ID();");
            return $r;
        }
        if (strpos(strtolower($q), "select") !== false) {
            if ($r == null) {
                return [];
            } else {
                $t = Array();
                while ($row = $r->fetch_assoc()) {
                    array_push($t, $row);
                }
                return $t;
            }
        }
        if (strpos(strtolower($q), "delete") !== false) {
            return $r;
        }
        return $r;
        return gettype($r) == "boolean" ? $r : (mysqli_fetch_assoc($r)); //return if boolean return else fetch
    }

}
