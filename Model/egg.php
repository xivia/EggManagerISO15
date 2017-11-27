<?php

/* 
   v 0.125
   Comments doze röckings
   Dont fuck with me!
*/

class egg {

    var $color;
    var $type;

    function setColor($color) {
        $this->color = $color;
    }

    function setType($type) {
        $this->type = $type;
    }

    function getInfo() {
        $a = Array();
        $a["type"] = $this->type;
        $a["color"] = $this->color;
        return $a;
    }

}
