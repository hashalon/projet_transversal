<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class Defm extends CriteriaTyped{

    // id, year, num, commune_code, types

    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'defm_id' );
        $this->hmatch( $data, 'setYear', 'defm_year' );
        $this->hmatch( $data, 'setNum', 'defm_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', '_types' );
    }
    
}