<?php 

include_once '../../model/egg.class.php';
include_once '../../controller/php/sql.class.php';
       
    /*$sql = new SQL();
    $res = $sql->query("SELECT * from egg;");
	while($row = mysqli_fetch_assoc($res))*/

    
    $con = mysqli_connect("sql11.freesqldatabase.com", "sql11217147", "ERfPPFL49a", "sql11217147");
    $sql = "SELECT * FROM egg;";
    $result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		echo "Name: " . $row["name"] . "<br>";
		echo "Color: " . $row["eggColor"] . "<br>";
		echo "Type: " . $row["eggType"] . "<br>";
		echo "Weight: " . $row["eggSize"] . "g" . "<br>";
		echo "Status: " . $row["eggStatus"] . "<br>";
		echo "Created at: " . $row["eggCreated"] . "<br>";
		echo "<hr>";
		}

?>