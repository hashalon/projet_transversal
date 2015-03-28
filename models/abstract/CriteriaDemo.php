<?php

require_once ($RootDir.'models/abstract/CriteriaCom.php');

abstract class CriteriaDemo extends CriteriaCom{
    
    // id, year, num, commune_code
    protected $_place;
    
    public function getPlace(){
        return $this->_place;
    }
    public function setPlace($place){
        $place = (string) $place;
        $this->_place = $place;
    }
}