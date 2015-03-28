<?php

require_once ($RootDir.'models/abstract/CriteriaDemo.php');

class Naissances extends CriteriaDemo{

    // id, year, num, commune_code, place

    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'naiss_id' );
        $this->hmatch( $data, 'setYear', 'naiss_year' );
        $this->hmatch( $data, 'setNum', 'naiss_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setPlace', 'naiss_place' );
    }
    
}