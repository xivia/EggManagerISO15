<?php

$rp = __DIR__;

require_once $rp . '/model/egg.class.php';
require_once $rp . '/controller/php/sql.class.php';


$sql = new SQL();
$res = $sql->query("SELECT * from egg;");
echo json_encode($res);