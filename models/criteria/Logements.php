<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class Logements extends Criteriatyped{

    // id, year, num, commune_code, types

    protected function hydrate( array $data ){
        $this->hmatch( $data, 'setId', 'log_id' );
        $this->hmatch( $data, 'setYear', 'log_year' );
        $this->hmatch( $data, 'setNum', 'log_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', '_types' );
    }
    
}