<?php

require_once './../../model/egg.class.php';
require_once './../../controller/php/sql.class.php';

$data = json_decode(filter_input(INPUT_POST, "array"));
$action = filter_input(INPUT_POST, "action");
$command = filter_input(INPUT_POST, "command");
$assoc = json_decode(filter_input(INPUT_POST, "array"), true);

$sql = new SQL();

if ($command == "egg") {

    if ($action == "get") {
        echo json_encode($sql->query("Select * FROM egg;"));
    }

    if ($action == "getSingle") {
        //TODO
    }

    if ($action == "add") {//TODO sql insert
        $egg = new egg($assoc[0]["color"], $assoc[0]["type"], $assoc[0]["weight"], $assoc[0]["name"]);
        $res = $sql->query("INSERT INTO egg (type, name, weight, color) VALUES (" . $assoc[0]["type"] . "," . $assoc[0]["name"] . "," . $assoc[0]["weight"] . "," . $assoc[0]["color"] . ");");
        echo $res ? (json_encode($egg->getInfo())) : (json_encode(false));
    }
}
