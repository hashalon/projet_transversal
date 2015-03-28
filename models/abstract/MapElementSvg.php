<?php

require_once($RootDir.'models/abstract/MapElement.php');

abstract class MapElementSvg extends MapElement{
    
    private $_svg;
    private $_children = array();
    
    public function getSvg(){
        return $this->_svg;
    }
    public function setSvg($svg){
        $svg = (string) $svg;
        $this->_svg = $svg;
    }
    
    public function getChildren(){
        return $this->_children;
    }
    public function setChildren( array $children ){
        $this->_children = $children;
    }
    public function addChild( $child ){
        if( $this->containsChild($child) ){
            $this->_children[] = $child;
        }
    }
    public function containsChild( $child ){
        if( in_array($child, $this->_children) ){
            return true;
        }
        return false;
    }
    
}