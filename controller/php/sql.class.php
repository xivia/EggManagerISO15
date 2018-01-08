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
        $this->sql = mysqli_connect("sql11.freesqldatabase.com", "sql11214651", "XnR6KxMuZB", "sql11214651");
        if (!$this->sql) {
            die("Connection failed: " . mysqli_connect_error() . "----" . mysqli_connect_errno());
        }
    }

    function __destruct() {
        mysqli_close($this->sql);
        $this->sql = null;
    }

    /**
     * @description mysql query function
     * @param String $q the mysql InnoDB query as String
     * @return type boolean || array
     */
    function query(String $q) {
        $r = mysqli_query($this->sql, $q);
        return gettype($r) == "boolean" ? $r : (mysqli_fetch_row($r)); //return if boolean return else fetch
    }

}
