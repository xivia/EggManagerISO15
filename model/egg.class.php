<?php

/*
  v 0.125
  Comments doze röckings
  Dont fuck with me!
 */

include_once 'weight.class.php';
include_once 'type.class.php';
include_once 'color.class.php';

class egg {

    var $color;
    var $type;
    var $weight;

    function __construct($color, $type, $gramm) {
        $this->color = new color($color);
        $this->type = new type($type);
        $this->weight = new weight($gramm);
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
        $a["weight"] = $this->weight->getWeight() . " g";
        return $a;
    }

}
