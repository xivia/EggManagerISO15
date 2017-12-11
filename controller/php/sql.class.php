<?php

$dbHost = "http://sql11.freesqldatabase.com/";
$dbName = "sql11210356";
$dbUser = "sql11210356";
$dbPass = "AEwLKpvY4Y";
$dbPort = "3306";

class SQL {

    private $sql;

    function __construct() {
        //$this->sql = mysqli_connect("http://sql11.freesqldatabase.com", "sql11210360", "Iso15.123");  
        $this->sql = mysqli_connect("sql11.freesqldatabase.com", "sql11210360", "Iso15.123", "sql11210360");
        if (!$this->sql) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function __destruct() {
        
    }

    function query($query) {
        $r = mysqli_query($this->sql, $query);
        $res = mysqli_fetch_assoc($r);
        return $res;
    }

}
