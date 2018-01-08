<?php

$rp = __DIR__;

require_once '../model/egg.class.php';
require_once '../controller/php/sql.class.php';

$sql = new SQL();
$res = $sql->query("SELECT * FROM egg;");
echo json_encode($res);