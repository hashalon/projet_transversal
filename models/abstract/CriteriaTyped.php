<?php

require_once ($RootDir.'models/abstract/CriteriaCom.php');
require_once ($RootDir.'models/interface/Types.php');

abstract class CriteriaTyped extends CriteriaCom implements Types{

    // id, year, num, commune_code
    protected $_types = array(); // list of types
    
    public function getTypes(){
        return $this->_types;
    }
    public function setTypes(array $types){
        $this->_types = $types;
    }
    public function addType($type){
        $type = (string) $type;
        $this->_types[] = $type;
    }
    public function isType($type){
        if( in_array($type, $this->_types) ){
            return true;
        }
        return false;
    }
}