<?php

require_once ($RootDir.'models/abstract/Base.php');

abstract class MapElement extends Base{
    
    // id
    protected $_name;
    protected $_parent_id;
    
    public function getName(){
        return $this->_name;
    }
    public function setName($name){
        $name = (string) $name;
        $this->_name = $name;
    }
    
    public function getParent(){
        return $this->_parent_id;
    }
    public function setParent($parent){
        $parent = (string) $parent;
        $this->_parent_id = $parent;
    }
    
}