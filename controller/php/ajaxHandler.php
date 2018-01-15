<?php

require_once './../../model/egg.class.php';
require_once './../../controller/php/sql.class.php';

$data = json_decode(filter_input(INPUT_POST, "array"));
$assoc = json_decode(filter_input(INPUT_POST, "array"), true);
$action = filter_input(INPUT_POST, "action");
$command = filter_input(INPUT_POST, "command");

/* DE HUERE VERDAMMTI RETARD VO JANICK HETT ALLI FELDER MIT 2 G GSCHREBE ABER ID WIRD = EGID ICH MEINGE WTF HUERE RETARD KYYYYYYYS JANICK HAST TU ÜBERHAUPT GELERNT*/

$dbName = sql::getTable();

function error($text, $err) {
    return ("*!* " . $text . " ERR: " . $err . " Command: " . $command . " Action: " . $action . " DATA: " . $data);
}

$sql = new SQL();

if ($command == "egg") {
    if ($action == "get") {
        $res = $sql->query("SELECT * FROM $dbName.egg;");
        echo json_encode($res);
    }
    if ($action == "getSingle") {
        $res = $sql->query("SELECT * FROM $dbName.egg WHERE egId = $data AND eggStatus != 99;");
        echo json_encode($res);
    }
    if ($action == "add") {
        $return = Array();
        foreach ($assoc as $a) {
            $egg = new egg($a["color"], $a["type"], $a["weight"], $a["name"]);
            $res = $sql->query("INSERT INTO $dbName.egg (name, eggColor, eggSize, eggType) VALUES ('" . $a["name"] . "', " . $a["color"] . ", " . $a["weight"] . ", " . $a["type"] . ");");
            $res ? (array_push($return, $egg->getInfo())) : (error("RIP", "500"));
        }
        echo json_encode($return);       // echo $res ? (json_encode($egg->getInfo())) : (json_encode(false));
    }
    if ($action == "getColors") {
        $res = $sql->query("SELECT * FROM $dbName.eggColor;");
        echo json_encode($res);
    }
    if ($action == "getTypes") {
        $res = $sql->query("SELECT * FROM $dbName.eggType;");
        echo json_encode($res);
    }

    if ($action == "delete") {
        echo json_encode($sql->query("DELETE FROM $dbName.egg WHERE eggId = $data;"));
    }
    if ($action == "setDeletetd") {
        echo json_encode($sql->query("UPDATE $dbName.egg SET eggStatus = 99 WHERE eggId = $data;"));
    }
    
    if ($action == "drop"){
        echo json_encode($sql->query("DROP TABLE $dbName.egg;"));
    }
}