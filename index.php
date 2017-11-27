<?php

/* 
    Das mitem getInfo chömmer au andersch mache kp
 */

include_once 'Controller/egg.php';

$egg = new egg;

$egg->setColor("Bananeblau");
$egg->setType("Gargerspan");

echo $egg->getInfo()["type"];
echo "<br>";
echo $egg->getInfo()["color"];