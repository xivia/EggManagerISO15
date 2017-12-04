<?php

class color {

    const WHITE = "#ffffff";
    const BLACK = "#000000";
    const RED = "#ff0000";
    const GREEN = "#00ff00";
    const BLUE = "#0000ff";
    const YELLOW = "#ffff00";

    var $color;

    function __construct($color) {
        $this->color = $color;
    }

    function __destruct() {
        
    }

    function getColor() {
        return $this->color;
    }

    function setColor($color) {
        $this->color = $color;
    }

}
