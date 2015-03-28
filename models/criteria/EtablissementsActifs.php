<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class EtablissementsActifs extends Criteriatyped{
    
    // id, year, num, commune_code, types
    
    protected function hydrate( array $data ){
        $this->hmatch( $data, 'setId', 'ea_id' );
        $this->hmatch( $data, 'setYear', 'ea_year' );
        $this->hmatch( $data, 'setNum', 'ea_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', '_types' );
    }
    
}