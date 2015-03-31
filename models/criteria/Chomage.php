<?php

require_once ($RootDir.'models/abstract/CriteriaZone.php');

class Chomage extends CriteriaZone{
    
    // id, year, num, zone_no
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'ch_id' );
        $this->hmatch( $data, 'setYear', 'ch_year' );
        $this->hmatch( $data, 'setNum', 'ch_number' );
        $this->hmatch( $data, 'setZoneEmploi', 'zone_no' );
    }
}