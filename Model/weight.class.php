<?php

class weight {

    var $gramm;

    function setGramm($gramm) {
        $this->gramm = $gramm;
    }

    function getWeight() {
        return $this->gramm;
    }

    function __construct($gramm) {
        $this->gramm = $gramm;
    }

    function __destruct() {
        
    }

}
