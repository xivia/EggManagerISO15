<?php

require_once './../../model/egg.class.php';

$data = json_decode(filter_input(INPUT_POST, "array"));
$action = filter_input(INPUT_POST, "action");
$command = filter_input(INPUT_POST, "command");


if ($command == "egg") {

    if ($action == "get") {
        $egg = new egg($data[0], $data[2], $data[1]);
        echo json_encode($egg);
    }
}
