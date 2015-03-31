<?php

require_once ($RootDir.'models/abstract/CriteriaTyped.php');

class EtablissementsActifs extends Criteriatyped{
    
    // id, year, num, commune_code
    
    public function __construct( array $data ){
        $this->hmatch( $data, 'setId', 'ea_id' );
        $this->hmatch( $data, 'setYear', 'ea_year' );
        $this->hmatch( $data, 'setNum', 'ea_num' );
        $this->hmatch( $data, 'setCommune', 'com_code' );
        $this->hmatch( $data, 'setTypes', 'etabl_id' );
    }
    
    public function getTypes(){
        global $_DATABASE;
        $result = [];
        $q = $_DATABASE->query('SELECT * FROM `etablissement` WHERE `etabl_id` = "'.$this->_types_id.'";');
        while( $data = $q->fetch(PDO::FETCH_ASSOC) ){
            $result[] = $data['etabl_type'];
        }
        return $result;
    }
    
}