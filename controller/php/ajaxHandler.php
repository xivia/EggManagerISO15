<?php

require_once './../../model/egg.class.php';
require_once './../../controller/php/sql.class.php';

/**
 * Allows to request the File via JS
 * Added by Sven Fahrni
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(filter_input(INPUT_POST, "array")); //numeric Array
$assoc = json_decode(filter_input(INPUT_POST, "array"), true); // Assoc Array
$action = filter_input(INPUT_POST, "action");
$command = filter_input(INPUT_POST, "command");

/* DE HUERE VERDAMMTI RETARD VO JANICK HETT ALLI FELDER MIT 2 G GSCHREBE ABER ID WIRD = EGID ICH MEINGE WTF HUERE RETARD KYYYYYYYS JANICK HAST TU ÜBERHAUPT GELERNT */

$dbName = sql::getTable();

function error($text, $err) {
    return ("*!* " . $text . " ERR: " . $err . " Command: " . $command . " Action: " . $action . " DATA: " . $data);
}

$sql = new SQL();

if ($command == "egg") {
    if ($action == "get") {
        $res = $sql->query("SELECT * FROM " . $dbName . ".egg WHERE `status` != 99;");
        echo $res ? json_encode($res) : error($res, mysqli_error($sql));
    }
    if ($action == "getSingle") {
        $res = $sql->query("SELECT * FROM " . $dbName . ".egg WHERE eggId = " . $data . " AND `status` != 99;");
        echo $res ? json_encode($res) : error($res, mysqli_error($sql));
    }
    if ($action == "add") {
        $return = Array();
        foreach ($assoc as $a) {
            $egg = new egg($a["color"], $a["type"], $a["size"], $a["name"]);
            $res = $sql->query("INSERT INTO " . $dbName . ".egg (`name`, eggColor, eggSize, eggType, `status`, weight) VALUES ('" . $a["name"] . "', " . (int) $a["color"] . ", 1, " . (int) $a["type"] . ", " . 1 . ", " . $a["size"] . ");");
            $res ? array_push($return, $res) : error("RIP", "sql örreerrrrr");
        }
        echo json_encode($return);       // echo $res ? (json_encode($egg->getInfo())) : (json_encode(false));
    }
    if ($action == "getColors") {
        $res = $sql->query("SELECT * FROM " . $dbName . ".eggColor;");
        echo $res ? json_encode($res) : error($res, mysqli_error($sql));
    }
    if ($action == "getTypes") {
        $res = $sql->query("SELECT * FROM " . $dbName . ".eggType;");
        echo $res ? json_encode($res) : error($res, mysqli_error($sql));
    }

    if ($action == "getSizes") {
        $res = $sql->query("SELECT * FROM " . $dbName . ".eggSize;");
        echo $res ? json_encode($res) : error($res, mysqli_error($sql));
    }

    if ($action == "getMinAndMaxSize") {
        $res = $sql->query("SELECT MAX(`sizeTo`) AS `max`, MIN(`sizeFrom`) AS `min` FROM " . $dbName . ".eggSize;");
        echo $res ? json_encode($res) : error($res, mysqli_error($sql));
    }

    if ($action == "delete") {
        echo json_encode($sql->query("DELETE FROM " . $dbName . ".egg WHERE eggId = " . $data . ";"));
    }
    if ($action == "setRIP") {
        echo json_encode($sql->query("UPDATE " . $dbName . ".egg SET `status` = 99 WHERE eggId = " . $data . ";"));
    }
    if ($action == "eatEgg") {
        echo json_encode($sql->query("UPDATE " . $dbName . ".egg SET `status` = 3 WHERE eggId = " . $data . ";"));
    }
    if ($action == "updateEgg") {
        die("123 tEt<paoistapiusdhf");
        echo json_encode($sql->query("UPDATE " . $dbName . ".egg SET `name` = " . ($assoc["name"] ? $assoc["name"] : null) . ", `eggColor` = " . $assoc["color"] . ", `eggType` = " . $assoc["type"] . ", `weight` = " . $assoc["weight"] . "  WHERE eggId = " . $assoc["id"] . ";"));
    }
    
    if ($action == "editEgg"){
        die("123 tEt<paoistapiusdhf");
    }


    if ($action == "drop") {
        //echo json_encode($sql->query("DROP TABLE $dbName.egg;"));
        //echo json_encode($sql->query("INSERT INTO $dbName.egg(name, eggColor, eggSize, eggtype, eggStatus, weight) VALUES ('Robin-chan', 2, 2, 3, 1, 32.5);"));
    }
}
