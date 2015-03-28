<?php

require_once ($RootDir.'models/abstract/Criteria.php');

abstract class CriteriaCom extends Criteria{
    
    // id, year, num
    protected $_commune_code;
    
    public function getCommune(){
        return $this->_commune_code;
    }
    public function setCommune($com){
        $com = (string) $com;
        $this->_commune_code = $com;
    }
    
}