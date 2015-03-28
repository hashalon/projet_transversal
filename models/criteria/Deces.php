<?php

require_once ($RootDir.'models/abstract/CriteriaDemo.php');

class Deces extends CriteriaDemo{
    
    // id, year, num, commune_code, place
    
    protected function hydrate( array &$data ){
        $this->hmatch( $data, 'setId', 'deces_id' );
        $this->hmatch( $data, 'setYear', 'deces_year' );
        $this->hmatch( $data, 'setNum', 'deces_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setPlace', 'deces_place' );
    }
    
}