<?php

class type {

    const MARZIPAN = "Marzipan";
    const NORMAL = "Normal";

    var $type;

    function __construct($type) {
        $this->type = $type;
    }

    function __destruct() {
        
    }

    function getType() {
        return $this->type;
    }

    function setType($type) {
        $this->type = $type;
    }

}
