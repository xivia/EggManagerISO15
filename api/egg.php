<?php

require_once '../model/egg.class.php';
require_once '../controller/php/sql.class.php';

/**
 * Allows to request the File via JS
 * Added by Sven Fahrni
 */
header("Access-Control-Allow-Origin: *");

$sql = new SQL();
$res = $sql->query("SELECT * FROM egg;");
echo json_encode($res);