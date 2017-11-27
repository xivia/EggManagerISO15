<?php

class color {

    const WHITE = "#ffffff";

    var $color;

    function getColor() {
        return $this->color;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function __construct($color) {
        $this->color = $color;
    }

    function __destruct() {
        
    }

}
