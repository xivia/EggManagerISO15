<?php

require_once './../../model/egg.class.php';
require_once './../../controller/php/sql.class.php';

$data = json_decode(filter_input(INPUT_POST, "array"));
$assoc = json_decode(filter_input(INPUT_POST, "array"), true);
$action = filter_input(INPUT_POST, "action");
$command = filter_input(INPUT_POST, "command");

$dbName = "sql11214651";

$sql = new SQL();

if ($command == "egg") {

    if ($action == "get") {
        $res = $sql->query("SELECT * FROM $dbName.egg;");
        echo json_encode($res);
    }

    if ($action == "getSingle") {
        //TODO
    }

    if ($action == "add") {//TODO sql insert foreach possibility is here too
        $return = Array();

        foreach ($assoc as $a) {
                    var_dump($a);
            $egg = new egg($a["color"], $a["type"], $a["weight"], $a["name"]);
            $res = $sql->query("INSERT INTO $dbName.egg (name, eggColor, eggSize, eggType) VALUES ('" . $a["name"] . "', '" . $a["color"] . "', '" . $a["weight"] . "', '" . $a["type"] . "');");
            $res ? (array_push($return, $egg->getInfo())) : ("failed");
        }
        echo json_encode($return);       // echo $res ? (json_encode($egg->getInfo())) : (json_encode(false));
    }
}