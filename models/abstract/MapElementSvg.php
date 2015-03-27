<?php

require_once($RootDir.'models/abstract/MapElement.php');

abstract class MapElementSvg extends MapElement{
    
    private $_svg;
    
    public function getSvg(){
        return $this->_svg;
    }
    public function setSvg($svg){
        $svg = (string) $svg;
        $this->_svg = $svg;
    }
    
}