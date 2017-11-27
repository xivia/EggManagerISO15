<?php

/*
  Das mitem getInfo chömmer au andersch mache kp
 */

include_once 'Model/egg.class.php';

$egg = new egg(color::WHITE, type::MARZIPAN, 15);

echo $egg->getInfo()["type"];
echo "<br>";
echo $egg->getInfo()["color"];
echo "<br>";
echo $egg->getInfo()["weight"];
