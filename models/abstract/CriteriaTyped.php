<?php

require_once ($RootDir.'models/abstract/CriteriaCom.php');
require_once ($RootDir.'models/interface/Types.php');

abstract class CriteriaTyped extends CriteriaCom implements Types{

    // id, year, num, commune_code
    protected $_types_id;
    
    public function setTypes($types){
        $this->_types_id = $types;
    }
    
    public function isType($type){
        if( in_array($type, $this->getTypes()) ){
            return true;
        }
        return false;
    }
}