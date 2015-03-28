<?php

require_once ($RootDir.'models/abstract/Criteria.php');

abstract class CriteriaZone extends Criteria{

    // id, year, num
    protected $_zone_no;

    public function getZoneEmploi(){
        return $this->_zone_no;
    }
    public function setZoneEmploi($zone){
        $zone = (string) $zone;
        $this->_zone_no = $zone;
    }

}