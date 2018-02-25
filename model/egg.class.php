<?php

/*
  v 0.125
  Comments dose röckings
  Dont fuck with me!
 */

require_once 'weight.class.php';
require_once 'type.class.php';
require_once 'color.class.php';

class egg {

    var $id;
    var $color;
    var $type;
    var $weight;
    var $name;

    function __construct($color, $type, $gramm, $name) {
        $this->color = new color($color);
        $this->type = new type($type);
        $this->weight = new weight($gramm);
        $this->name = $name;
    }

    function __destruct() {
        
    }

    function setColor($color) {
        $this->color = new color($color);
    }

    function setType($type) {
        $this->type = new type($type);
    }

    function setWeight($gramm) {
        $this->weight = new weight($gramm);
    }

    function getInfo() {
        $a = Array();
        $a["type"] = $this->type->getType();
        $a["color"] = $this->color->getColor();
        $a["name"] = $this->name;
        $a["weight"] = $this->weight->getWeight();
        //$a["id"] = $this->id;
        return $a;
    }

}
