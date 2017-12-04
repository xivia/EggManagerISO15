<?php

/*
  Das mitem getInfo chömmer au andersch mache kp
 */

require_once 'model/egg.class.php';

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Title of the document</title>";

echo "<script src='http://code.jquery.com/jquery-latest.min.js'></script>";
echo "<script src='view/js/request.js'></script>";

echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";

echo "</head>";
echo "<body>";

$egg = new egg(color::WHITE, type::MARZIPAN, 15);

echo $egg->getInfo()["type"];
echo "<br>";
echo $egg->getInfo()["color"];
echo "<br>";
echo $egg->getInfo()["weight"];

require_once 'view/php/idk.m8.php';

echo "</body>";
echo "</html>";
